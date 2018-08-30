# yii2-time-down-counter
Widget for yii2, to start count down timer with a lot of options, This widget build dependence of timeDownCounter JS library

[![Total Downloads](https://img.shields.io/packagist/dt/aneeshikmat/yii2-time-down-counter.svg?style=popout-square)](https://packagist.org/packages/aneeshikmat/yii2-time-down-counter)
[![Latest Stable Version](https://poser.pugx.org/aneeshikmat/yii2-time-down-counter/v/stable)](https://packagist.org/packages/aneeshikmat/yii2-time-down-counter)

## Screenshot from normal result

![Yii2 timeDownCounter screenshot_t1](http://2nees.com/github/timeDownCounter/def-timer-widget.png)

## Screenshot for templete 1

![Yii2 timeDownCounter screenshot_temp1](http://2nees.com/github/timeDownCounter/temp-1.png)

## Screenshot for templete 2

![Yii2 timeDownCounter screenshot_temo2](http://2nees.com/github/timeDownCounter/temp-2.png)

And you can custmize you'r template as yourr like, we give you an option to build and control your design or use our simple design and change color, distance ...etc as you like.

## Features

1. Countdown timer work with days, houres, minutes and seconds
2. Appilty to get timer html with fully html item container, or semi or none.(in other word you will get result dirctly or with html wrappring).
3. Countdown timer can be stop to custmize styling or to get template to init it as default value.
4. You have an option to determine the sperator for timer.
5. You can handling time over message.
6. You have an option to determind if timer will display d-h-m-s or h-m-s or m-s.
7. its an javascript functon and you dont need to include any other js/css lib.
8. You can set script to execute when timer is over

## Decencies

Nothing.

## Installation:
The preferred way to install this extension is through [composer](https://getcomposer.org/).

Either run

`php composer.phar require --prefer-dist aneeshikmat/yii2-time-down-counter "v1.0.0-stable"`

or add

`"aneeshikmat/yii2-time-down-counter": "v1.0.0-stable"`

to the require section of your `composer.json` file.

## Usage
To use this widget you need to add this code to your html:

```
<?php
    use aneeshikmat\yii2\Yii2TimerCountDown\Yii2TimerCountDown;
?>

<body>
............
<div class="row">
    <div class="alert alert-success">
        Using Widget With Default Option
    </div>
    <div class="col-xs-12">
        <div id="time-down-counter"></div>
        <?= Yii2TimerCountDown::widget() ?>
    </div>
</div>
```

As you see, its very simple, and now we will be explaning this code, and then go to display all option may be use to help us,
In prev code we call Yii2TimerCountDown widget.(if you write this syntax dirctly without determind any option, you will git time over message).

Now let's go to explain all possible option:

```

<?php
  $callBackScript = <<<JS
            alert('Timer Count Down 6 Is finshed!!');
JS;
?>

        <div id="time-down-counter-2"></div>
        <?= Yii2TimerCountDown::widget([
            'countDownIdSelector' => 'time-down-counter-2',
            'countDownDate' => strtotime('+1 minutes') * 1000,// You most * 1000 to convert time to milisecond
            'countDownResSperator' => ':',
            'addSpanForResult' => false,
            'addSpanForEachNum' => false,
            'countDownOver' => 'Expired',
            'countDownReturnData' => 'from-days',
            'templateStyle' => 0,
            'getTemplateResult' => 0,
            'callBack' => $callBackScript
        ]) ?>
```
1) countDownIdSelector: This option give you apilty to change default timer wrapper, its usfall if you have more than one timer in the same page, default selctor value is 'time-down-counter', and this selector must be an ID.

2) countDownDate: This option will accept count down date in millisecond, if you keep it empty the default value will be current time so that the count down over message will be print.
Note: you need to set time in millisecond like this **strtotime("+1 day") * 1000;** **OR strtotime("2018-11-10 15:47:25") * 1000**.

3) countDownResSperator: This option give you apilty to change time Sperator, default sperator is **```<span class="timeDownSperator">:</span>```**.
    
4) countDownReturnData: This option give you apilty to display full timer result (days, hours, minutes, seconds), or (hours, minutes, seconds) or (minutes, seconds), and accpet options is ('from-days' is default, 'from-hours', 'from-minutes').
Note: This option will keep timer work nomraly without removed any value, just hide / show option.

5) addSpanForResult: This option give you apilty to set each number groub in <span> tag contain general class called **item-counter-down**.
    
6) addSpanForEachNum: This option give you apilty to set each number in timer in <span> tag contain general class called **inner-item-counter-down**. 
    
## screenshot for html result for point 5 and 6: 

![Yii2 timeDownCounter screenshot_temo2](http://2nees.com/github/timeDownCounter/temp-3.png)

7) contDownOver: This option give you apilty to update message for count down over (when timer is finshed).

8) getTemplateResult: This option give you apilty to stop count down timer, the default value is **0** and thats mean timer work, **1** is mean stop timer and display timer result, **2** is mean stop timer and display html timer result.
These option give you abilty to design / styling timer on browser dirctly, since the timer is work depednace of Interval function, and second option is usfall when you need to get result to set default value in html, since js need some time to start timing.

example if we use **getTemplateResult: 2** :
```
<div id="time-down-counter">30<span class="timeDownSperator">:</span>23<span class="timeDownSperator">:</span>59<span class="timeDownSperator">:</span>58</div>
```
9) templateStyle: This option give you apilty to use one of templates set by default in this widget, and you can override these template in you'r css files...etc, theres 3 values for this option (0 no template and its default, 1, 2).
Note: If you set template 1 or 2 the addSpanForResult & addSpanForEachNum will be change to true!.

10) callBack: this option used to set script will be render after timer end. (Callback function)
