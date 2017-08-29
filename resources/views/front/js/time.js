var hour = document.getElementById('hour'); //定義一個變數，取得id為'hour'標籤
var minute = document.getElementById('minute'); //定義一個變數，取得id為'minute'標籤
var second = document.getElementById('second'); //定義一個變數，取得id為'second'標籤

function showTime(){ //定義一個函數，用於顯示時間
    var oDate = new Date(); //定義一個創建以為Date()為對象的新變數
    var iHours = oDate.getHours(); //定義一個變數，取得「小時」資訊
    var iMinutes = oDate.getMinutes(); //定義一個變數，取得「分」資訊
    var iSeconds = oDate.getSeconds(); //定義一個變數，取得「秒」資訊
    
    hour.innerHTML= AddZero(iHours); //在id為'hour'的HTML標籤內加入「小時」資訊
    minute.innerHTML = AddZero(iMinutes); //在id為'minute'的HTML標籤內加入「分」資訊
    second.innerHTML = AddZero(iSeconds); //在id為'second'的HTML標籤內加入「秒」資訊
}

showTime(); //執行定義的函數
setInterval(showTime, 1000); //指定執行函數的時間間隔，單位為'ms'

function AddZero(n){ //定義一個函數，用於將一位數左側加入'0'
    if(n<10){ // 判斷數字是否小於10
        return '0' + n; //若小於10，在左側加上'0'
    }
    
    return '' + n; //否則，顯示原來數值
}