# Allow to specify labels for constants in a Model


Feel free to let me know what else you want added via:

- [Issues](https://github.com/ancor-dev/yii2-constant-label/issues)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ php composer.phar require ancor/yii2-constant-label
```

or add

```
"ancor/yii2-constant-label": "dev-master"
```

to the `require` section of your `composer.json` file.

## Usage

To use ConstantLabelBehavior, insert the following code to your Model class:

```php
use common\behaviors\ConstantLabelBehavior;

public function behaviors()
{
  return [
      [
          'class' => ConstantLabelBehavior::className(),
          'constantLabels' => [
              'status' => [
                  self::STATUS_ACTIVE  => 'User is active',
                  self::STATUS_DELETED => 'User deleted',
              ]
          ],
      ]
  ];
}
```