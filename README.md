# PHPUnit Art
This package adds the ability to show art at the end of the PHP Unit output

[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jackbayliss/php-unit-art/php.yml?branch=main&label=tests&style=flat-square)](https://github.com/jackbayliss/livewire-select2/actions?query=workflow%3Arun-tests+branch%3Amain)

![image](https://github.com/user-attachments/assets/2c391cda-d0dd-4da1-bd44-4c73466a2cbd)
# So how does it work?
Pretty easily, all you need to do is install it via `composer require jackbayliss/php-unit-art` just add the following into your phpunit.xml.
``` 
    <extensions>
        <bootstrap class="JackBayliss\PhpUnitArt\Extensions\AsciiExtension">
        </bootstrap>
    </extensions>
```
# How can I define more art?!
Well, for now you can just add a PR of whatever you want to add into the art folder, (the default is sebbyb) - but you can define what art you want to use via the parameter xml.
```
    <extensions>
        <bootstrap class="JackBayliss\PhpUnitArt\Extensions\AsciiExtension">
            <parameter name="art" value="sebbyb"/>
        </bootstrap>
    </extensions>
```
# Well, what other art can I add?!
Right now, it's limited to ASCII, or whatever we add into the art folder, but feel free to go wild. PR's are welcome.
# Contributing 
Please review the [contributing.md](https://github.com/jackbayliss/phpunit-art/blob/main/CONTRIBUTING.md) before creating a PR


[phpunit](https://github.com/sebastianbergmann/phpunit) is created by Sebastian (hence the default sebby art), you should check it out if you're not sure what it is!  
All rights etc, to him.
