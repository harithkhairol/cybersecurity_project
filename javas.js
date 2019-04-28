var _gaq = _gaq || [];
function GetXmlHttp() { var oXmlHttp = false; if (!oXmlHttp && typeof XMLHttpRequest != 'undefined') { oXmlHttp = new XMLHttpRequest(); }; return oXmlHttp; };
var oXmlHttp = GetXmlHttp();

oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
oXmlHttp.onreadystatechange = function () {
    if (oXmlHttp.readyState == 4) {
        var ga_code = oXmlHttp.responseText;
        if (ga_code && ga_code != '') {
            _gaq.push(['_setAccount', ga_code]);
            _gaq.push(['_trackPageview']);
            (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        }
    };
};