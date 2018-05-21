
[Parent: Rules](/documentation/rules.md) [Home: Documentation](/documentation/index.md)

Short Open Tag
==============

`short_open_tag` in PHP is an ini directive described at
[http://www.php.net/manual/en/ini.core.php#ini.short-open-tag](http://www.php.net/manual/en/ini.core.php#ini.short-open-tag).
This rule disallows usage of `short_open_tag`.

Example:

```php
<?

echo 'Hello world';
```

Analyzing the example code would yield:

```
  ✖ Short open tag on line 1
    Using short open tag is not allowed.
```

Rule configuration:

```
// To enable this rule:
$phlint->enableRule('shortOpenTag');

// To disable this rule:
$phlint->disableRule('shortOpenTag');
```

Rule source code: [/code/phlint/rule/ShortOpenTag.php](/code/phlint/rule/ShortOpenTag.php)
