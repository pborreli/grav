<?php
namespace Grav\Common;

use Grav\Common\Filesystem\File;

/**
 * The Plugins object holds an array of all the plugin objects that
 * Grav knows about
 *
 * @author RocketTheme
 * @license MIT
 */
class Plugins
{
    /**
     * @var array|Plugin[]
     */
    protected $plugins;


    /**
     * Recurses through the plugins directory creating Plugin objects for each plugin it finds.
     *
     * @return array|Plugin[] array of Plugin objects
     * @throws \RuntimeException
     */
    public function load()
    {
        /** @var Config $config */
        $config = Registry::get('Config');
        $plugins = (array) $config->get('plugins');

        foreach ($plugins as $plugin => $data) {
            if (empty($data['enabled'])) {
                // Only load enabled plugins.
                continue;
            }

            $folder = PLUGINS_DIR . $plugin;
            $filePath = $folder . DS . $plugin . PLUGIN_EXT;
            if (!is_file($filePath)) {
                throw new \RuntimeException(sprintf("Plugin '%s' enabled but not found!", $filePath, $plugin));
            }

            require_once $filePath;

            $pluginClass = 'Grav\\Plugin\\'.ucfirst($plugin).'Plugin';

            if (!class_exists($pluginClass)) {
                throw new \RuntimeException(sprintf("Plugin '%s' class not found!", $plugin));
            }

            $this->plugins[$pluginClass] = new $pluginClass($config);
        }

        return $this->plugins;
    }

    public function add($plugin)
    {
        if (is_object($plugin)) {
            $this->plugins[get_class($plugin)] = $plugin;
        }
    }

    /**
     * Return list of all plugin data with their blueprints.
     *
     * @return array|Data\Data[]
     */
    static public function all()
    {
        $list = array();
        $iterator = new \DirectoryIterator(PLUGINS_DIR);

        /** @var \DirectoryIterator $directory */
        foreach ($iterator as $directory) {
            if (!$directory->isDir() || $directory->isDot()) {
                continue;
            }

            $type = $directory->getBasename();
            $list[$type] = self::get($type);
        }

        ksort($list);

        return $list;
    }

    static public function get($type)
    {
        $blueprints = new Data\Blueprints(PLUGINS_DIR . $type);
        $blueprint = $blueprints->get('blueprints');
        $blueprint->name = $type;

        // Load default configuration.
        $file = File\Yaml::instance(PLUGINS_DIR . "{$type}/{$type}" . YAML_EXT);
        $obj = new Data\Data($file->content(), $blueprint);

        // Override with user configuration.
        $file = File\Yaml::instance(USER_DIR . "config/plugins/{$type}" . YAML_EXT);
        $obj->merge($file->content());

        // Save configuration always to user/config.
        $obj->file($file);

        return $obj;
    }
}
