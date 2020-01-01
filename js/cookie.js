//创建cookie
function createCookie(key,value,expires,domain,secure){
    var cookieText = encodeURIComponent(key) + "=" + encodeURIComponent(value) + ";path=/";
    if(!isNaN(expires)){
        if(typeof expires == "number" && expires > 0){
            var date = new Date();
            date.setDate(date.getDate() + expires);
            cookieText += ";expires=" + date;
        }
    }
    if(domain){
        cookieText += ";domain=" + domain;
    }
    if(secure){
        cookieText += ";secure";
    }
    document.cookie = cookieText;
}

//获取cookie
function getCookie(key){
    var keyText = encodeURIComponent(key) + "="
    var start = document.cookie.indexOf(keyText); //找到开始位置
    if(start != -1){
        var end = document.cookie.indexOf(";",start); //找到结束位置
        if(end == -1){
            end = document.cookie.length;
        }
        var cookieValue = decodeURIComponent(document.cookie.substring(start + keyText.length,end));
    }
    return cookieValue;
}

//删除cookie
function removeCookie(key){
    document.cookie = key + "=;expires=" + new Date(0) + ";path=/";
}