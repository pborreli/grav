# ![](https://avatars1.githubusercontent.com/u/8237355?v=2&s=50) Grav

Grav is a **Fast**, **Simple**, and **Flexible**, file-based Web-platform.  There is **Zero** installation required.  Just extract the ZIP archive, and you are already up and running.  It follows similar principals to other flat-file CMS platforms, but has a different design philosophy than most.

The underlying architecture of Grav has been designed to use well-established and _best-in-class_ technologies, where applicable, to ensure that Grav is simple to use and easy to extend. Some of these key technologies include:

* [Twig Templating](http://twig.sensiolabs.org/): for powerful control of the user interface
* [Markdown](http://en.wikipedia.org/wiki/Markdown): for easy content creation
* [YAML](http://yaml.org): for simple configuration
* [Doctrine Cache](http://docs.doctrine-project.org/en/2.0.x/reference/caching.html): layer for incredible performance

# QuickStart

You have two options to get Grav:

### Downloading a Grav Package

You can download a **ready-built** package from the [Downloads page on http://getgrav.org](http://getgrav.org/downloads)

### From GitHub

1. Clone the Grav repository from [https://github.com/getgrav/grav]() to a folder in the webroot of your server, e.g. `~/webroot/grav`. Launch a **terminal** or **console** and navigate to the webroot folder:
   ```
   $ cd ~/webroot
   $ git clone https://github.com/getgrav/grav.git
   ```

2. Install the **plugin** and **theme dependencies** by using the [Grav CLI application](http://learn.getgrav.org/advanced/grav-cli) `bin/grav`:
   ```
   $ cd ~/webroot/grav
   $ bin/grav install
   ```

Check out the [install procedures](http://learn.getgrav.org/basics/installation) for more information.


# Contributing
We appreciate any contribution to Grav, whether it is related to bugs, grammar, or simply a suggestion or improvement.
However, we ask that any contribution follow our simple guidelines in order to be properly received.

All our projects follow the [GitFlow branching model][gitflow-model], from development to release. If you are not familiar with it, there are several guides and tutorials to make you understand what it is about.

You will probably want to get started by installing [this very good collection of git extensions][gitflow-extensions].

What you mainly want to know is that:

- All the main activity happens in the `develop` branch. Any pull request should be addressed only to that branch. We will not consider pull requests made to the `master`.
- It's very well appreciated, and highly suggested, to start a new feature whenever you want to make changes or add functionalities. It will make it much easier for us to just checkout your feature branch and test it, before merging it into `develop`

# Getting Started

* [What is Grav?](http://learn.getgrav.org/basics/what-is-grav)
* [Install](http://learn.getgrav.org/basics/installation) Grav in few seconds
* Understand the [Configuration](http://learn.getgrav.org/basics/grav-configuration)
* Take a peek at our available free [Skeletons](http://getgrav.org/downloads/skeletons#extras)
* If you have questions, check out `#grav` on irc.freenode.net
* Have fun!

# Exploring more

* Have a look at our [Basic Tutorial](http://learn.getgrav.org/basics/basic-tutorial)
* Dive into more [advanced](http://learn.getgrav.org/advanced) functions

# License

See [LICENSE](LICENSE)


[gitflow-model]: http://nvie.com/posts/a-successful-git-branching-model/
[gitflow-extensions]: https://github.com/nvie/gitflow
