# Boilerplate
Boilerplate files for Joomla! extensions.

# Installation
The boilerplates can be installed as-is using the Extension Manager. However, the component, module and plugin will be called Joomlathing :)

To create installable zip packages, you only need to zip the folder with the files and it is ready to be installed.

# Customizing
To customize the boilerplates using your own name you need to take the following steps:

1. Do a **case-sensitive** replace on the following strings and replace them with your own name:
   * joomlathing
   * Joomlathing
   * JOOMLATHING
2. Do a **case-sensitive** replace on the following tags with their actual information:
   * [DATE]
   * [PROJECT_NAME]
   * [AUTHOR]
   * [AUTHOR_EMAIL]
   * [AUTHOR_URL]
   * [COPYRIGHT]
   * [PACKAGE_NAME]
   
# Changing the repository layout [ 2019-12-22 ]
In hindsight putting the code in the root of the repository was not the
best of ideas ;)

Moving forward with Joomla 4, all source code will be in the **src** folder
and the main folders will remain as they are used by PhpStorm and removing
them would break the installations of those using older PhpStorm versions.

Furthermore the J3 component will be extended to include a sample of a
listing view and an edit view.

The J4 component is taken from [Astridx](https://github.com/astridx/boilerplate) who I want to thank for her contribution. 
