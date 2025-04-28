# W Editions Github Repo

## Installation
Hello, in order to preview this site correctly, you first have to install the dependencies

First, you need to install some way to use Kirby CMS -- [here's their quickstart guide with requirements etc.](https://getkirby.com/docs/guide/quickstart)

then:

1. clone the repo using `git clone --recurse-submodules` to get the submodules too.
2. `cd` to the `dev` folder on your computer
3. install dependencies using `composer update`

you can also install the dependencies independently.

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
