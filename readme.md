# W Editions Github Repo

## Installation
Hello, in order to preview this site correctly, you first have to install the dependencies

First, you need to install the requirements for Kirby -- [here's their quickstart guide with a list of requirements, etc.](https://getkirby.com/docs/guide/quickstart)

### Primary Requirements
- PHP 8.1, 8.2, or 8.3 (recommended)
- Composer
- Local server of your choosing (see Local Server below)

### Clone and install dependencies

1. clone the repo using `git clone --recurse-submodules` to get the submodules too.
   - if you've already cloned the repo, use `git submodule init` then `git submodule update` to get the submodules.
2. `cd` to the `dev` folder in the cloned repo

#### Install Using Composer
the Kirby folder and all of the files relating to the main CMS App are not tracked by this repo and can be installed any way you want -- Composer is how I choose to do it.

From the `/dev/` folder:
```
composer update
```

There should already be a composer.lock and composer.json file.

#### Install Manually

You can also install the Kirby dependencies manually by [downloading the Kirby files from their github](https://github.com/getkirby/plainkit).

1. Download the files
2. Copy the following files from the Kirby Plainkit into the `/dev/` folder of the repo and replace any files that already exist
     - /kirby
     - /index.php
     - /.htaccess

## Local Server
This site uses Kirby as a CMS with php templating.

I use DDEV to setup my local server environment. [You can find instructions for DDEV and Kirby here](https://getkirby.com/docs/cookbook/development-deployment/ddev).

There is already a ddev project in the `dev` folder of this repo so it should set it up the same way if you just say `ddev start`.

Alternatively, you can use any other local [php server setup that has the requirements](https://getkirby.com/docs/guide/install-guide/development-environment).

## Folder setup
I use CodeKit to preprocess my SASS code into CSS, and instead of using a build folder, I just have separate folders for CSS and SCSS, Javascript gets minified from a `_dev` folder to the main `js` folder.

## Content Folder
The content folder is a submodule. This is done so that I can sync the content folder between the website and github. Changes to the public site get committed and pushed nightly.

**Do not push any changes to the content folder unless you are in a dev branch, I am dumb and haven't set up the content folder to pull changes nightly before committing.**
