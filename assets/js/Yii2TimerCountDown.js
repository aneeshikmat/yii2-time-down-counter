var timeDownCounter=function(options,whenDone){var countDownOver="EXPIRED";var countDownIdSelector='time-down-counter';var countDownReturnData;var countDownResSperator='<span class="timeDownSperator">:</span>';var addSpanForResult=!1;var addSpanForEachNum=!1;var countDownDate=new Date().getTime();var now=new Date().getTime();var getTemplateResult=0;if(options){Object.keys(options).map(function(objectKey,index){var value=options[objectKey];eval(objectKey+"='"+value+"'")})}
function get2D(num){return(num.toString().length<2?"0"+num:num).toString()}
function timerCallBack(){if(whenDone&&typeof(whenDone)==="function"){whenDone()}}
return{startCountDown:function(){var start=setInterval(function(){if(now){now = parseInt(now) + 1000;}else{now = new Date().getTime();}var distance=countDownDate-now;var timerData=[];timerData[0]=get2D(Math.floor(distance/(1000*60*60*24)));timerData[1]=get2D(Math.floor((distance%(1000*60*60*24))/(1000*60*60)));timerData[2]=get2D(Math.floor((distance%(1000*60*60))/(1000*60)));timerData[3]=get2D(Math.floor((distance%(1000*60))/1000));if(addSpanForEachNum){for(var i=0;i<timerData.length;i++){var tempTimerData=timerData[i].toString().split('');tempTimerData=tempTimerData.map(function(a,i){return"<span class='inner-item-counter-down inner-item-counter-down-"+i+"'>"+a+"</span>"});timerData[i]=tempTimerData.join('')}}
if(addSpanForResult){timerData=timerData.map(function(a,i){return"<span class='item-counter-down item-counter-down-"+i+"'>"+a+"</span>"})}
var countDownReturnDataResult=timerData.join(countDownResSperator);if(countDownReturnData=='from-hours'){timerData.splice(0,1);countDownReturnDataResult=timerData.join(countDownResSperator)}else if(countDownReturnData=='from-minutes'){timerData.splice(0,2);countDownReturnDataResult=timerData.join(countDownResSperator)}
if(getTemplateResult&&getTemplateResult!='0'){clearInterval(start);if(getTemplateResult=='2'){document.getElementById(countDownIdSelector).textContent='<div id="'+countDownIdSelector+'">'+countDownReturnDataResult+'</div>'}else{document.getElementById(countDownIdSelector).innerHTML=countDownReturnDataResult}
timerCallBack();return}
document.getElementById(countDownIdSelector).innerHTML=countDownReturnDataResult;if(distance<0){clearInterval(start);document.getElementById(countDownIdSelector).innerHTML=countDownOver;timerCallBack()}},1000)},}}


/*
 * timeDownCounter Ver 1.0
 * https://github.com/aneeshikmat/timeDownCounter
 */
