<?php
namespace aneeshikmat\yii2\Yii2TimerCountDown;

use yii\base\Widget;
use yii\db\Exception;

class Yii2TimerCountDown extends Widget
{
    /**
     * @var This option give you apilty to change default timer wrapper,
     *  its usfall if you have more than one timer in the same html page,
     *  default selctor value is 'time-down-counter', and this selector must be an ID.
     */
    public $countDownIdSelector = 'time-down-counter';

    /*
     * @var milisecond time
     * This option will accept count down date in millisecond, if you keep it empty the default value will be current time
     */
    public $countDownDate;

     /*
     * @var bool
     * This option give you ability to set current Time from server.
     */
    public $addServerTime = false;

    /*
     * @var milisecond time
     * This option will accept start of count down in millisecond, if you keep it empty the default value will be current time
     */
    public $now;

    /*
     * @var string
     * This option give you apilty to change time Sperator, default sperator is : nested in tag.
     */
    public $countDownResSperator = '<span class="timeDownSperator">:</span>';
    
    /*
     * @var string
     * This option give you apilty to display full timer result (days, hours, minutes, seconds),
     *  or (hours, minutes, seconds) or (minutes, seconds),
     *  and accpet options is ('from-days' is default, 'from-hours', 'from-minutes').
     *  Note: This option will keep timer work nomraly without removed any value, just hide / show option.
     */
    public $countDownReturnData = 'from-days';
    
    /*
     * @var bool
     * This option give you ability to set each number group in tag contain general class called item-counter-down.
     */
    public $addSpanForResult = false;
    
    /*
     * @var bool
     * This option give you apilty to set each number in timer in tag contain general class called inner-item-counter-down.
     */
    public $addSpanForEachNum = false;
    
    /*
     * @var string
     * This option give you apilty to update message for count down over (when timer is finshed).
     */
    public $countDownOver = "EXPIRED";
    
    /*
     * @var string
     * his option give you apilty to stop count down timer,
     *  the default value is 0 and thats mean timer work,
     *  1 is mean stop timer and display timer result,
     *  2 is mean stop timer and display html timer result.
     */
    public $getTemplateResult = 0;
    
    /*
     * @var string contain js callback script
     */
    public $callBack = '';
    
    /**
     * @var Integer to determind template Style
     * 0: Default time down counter
     * 1: Template - 1
     * 2: Template - 2
     */
    public $templateStyle = 0;

    /**
     * Initializes the view.
     */
    public function init(){
        parent::init();
        
        if(empty($this->countDownDate)){
            $this->countDownDate = time() * 1000;
        }
        if($this->addServerTime){
            $this->now = time() * 1000;
        }
        
        // If you change default template or you need to use template, you most has an inner spans
        if(!empty($this->templateStyle)){
            $this->addSpanForEachNum = $this->addSpanForResult = true;
        }
    }

    /**
     * Runs the widget.
     */
    public function run()
    {
        $this->registerClientScript();
    }

    public function registerClientScript()
    {
        $view = $this->getView();
        Yii2TimerCountDownAsset::register($view);

        $js = <<<JS
            timeDownCounter({
                'countDownIdSelector': '$this->countDownIdSelector',
                'countDownDate': '$this->countDownDate',
                'now': '$this->now',
                'countDownResSperator': '$this->countDownResSperator',
                'countDownReturnData': '$this->countDownReturnData',
                'addSpanForResult': '$this->addSpanForResult',
                'addSpanForEachNum': '$this->addSpanForEachNum',
                'countDownOver': '$this->countDownOver',
                'getTemplateResult': '$this->getTemplateResult'
            }, function(){
                $this->callBack
            }).startCountDown();
JS;
        
        $template1 = <<<temp1
            #$this->countDownIdSelector .item-counter-down {
                background: #c0c0c0;
                display: inline-block;
                padding: 15px;
                font-size: 45px;
                color: #fff;
                border-radius: 20%;
                margin: 0 5px;
            }

            #$this->countDownIdSelector .timeDownSperator {
                font-size: 45px;
                color: #c0c0c0;
                font-weight: bold;
            }
temp1;
                
        $template2 = <<<temp2
            #$this->countDownIdSelector .item-counter-down {
                margin: 0 3px;
            }

            #$this->countDownIdSelector .inner-item-counter-down {
                background: #c0c0c0;
                display: inline-block;
                padding: 15px;
                font-size: 45px;
                line-height: 30px;
                color: #fff;
                border-radius: 7px;
                margin: 0 1px;
            }

            #$this->countDownIdSelector .timeDownSperator {
                font-size: 45px;
                color: #c0c0c0;
                font-weight: bold;
            }
temp2;
        
        $view->registerJs($js);
        
        // Set Template Style
        if($this->templateStyle == 1){
            $view->registerCss($template1);
        }else if($this->templateStyle == 2){
            $view->registerCss($template2);
        }
        
    }
}
