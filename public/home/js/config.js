var channelConf = {
    'onlineSeed': '919', //种子用户
    'weibo': '920', //小区
    'zaojiao': '921', // 早教中心
    'school': '922', // 学校
    'pcWebsite': '923', //pc官网
    'MWebsite': '924', // M官网
    'listing': '925', // 58M端listing
    'listing_app': '926', // 58APPlisting
    'inside_1112': '927', //1112内部资源
    'outside_1112': '928', //1112外部资源
    'biggerone': '929', //biggerone
    'debang': '930', //德邦物流下载
    'appPush': '931', //appPush
    'apppush': '931', //appPush
    'msytopban': '932', //58M站首页顶部banner位
    'mindexban': '933', //58M站大类页顶部banner
    'mlistban': '934', //58M站列表页顶部banner
    'mwenzilian': '935', //58M站文字链
    'appsytopban': '936', // 58APP首页顶部banner位
    'appindexban': '937', //58APP大类页顶部banner
    'applistban': '938', // 58APP列表页顶部banner
    'appwenzilian': '939', //58M站文字链
    'pcsytopban': '940', // 58PC首页顶部banner位
    'pcindexban': '941', //58PC大类页顶部banner
    'pclistban': '942', //58PC列表页顶部banner
    'pcminiban': '943', //58PCminiBanner
    'pcsydownban': '944', //58PC首页底部banner
    'pcfc': '945', //58PC浮层弹窗
    'mindextc': '946', //58M大类页弹窗
    'mesdownfc': '947', //M二手下浮层
    'mdownwzl': '948', //M下浮层文字链
    'appxqywzl': '949', //58app文字链
    'weiboPush1': '950', //微博推送url策略1
    'weiboPush2': '951', //微博推送url策略2
    'apphomegdrk': '952', //58app首页入口（固定）
    'appzpindextop': '953', //招聘APP大类页顶通
    'mzpindextop': '954', //招聘M大类页顶通
    'appfcindextop': '955', //房产APP大类页顶通
    'mfcindextop': '956', //房产M大类页顶通
    'mesxqywzl': '957', //58m二手详情页文字链
    'listingGanji': '958', //listingGanji
    'Mhbdownload': '959', //58M领取红包下载
    'Apphbdownload': '960', //58App领取红包下载
    'gjpc': '961', // 赶集pc首页&大类&列表顶通
    'gjmsytopban': '962', //赶集M首页-顶通
    'gjmsywzl': '963', //赶集M首页文字链
    'gjmindextopban': '964', //赶集M二手大类页顶部
    'gjmindexwzl': '965', //赶集M二手大类页文字链
    'gjmlisttopban': '966', //赶集M二手列表页顶部
    'ghmxqywzl': '967', //赶集M详情页文字链
    'gjapptopban': '968', //赶集APP首页顶通
    'gjappindextopban': '969', //赶集APP大类页顶部
    'gjapplisttopban': '970', //赶集APP列表页
    'gjappxqywzl': '971', //赶集APP详情页文字链
    'gjappesindexban': '972', //赶集app二手大类页运营位
    'gjmesindexban': '973', //赶集m二手大类页运营位
    'gjmesban': '973', //赶集m二手大类页运营位
    '58pcfb': '974', //58pc发布引导
    '58appfb': '975', //58app发布引导
    '58mfb': '976', //58m发布引导
    'gjmeslistqrzz': '977', //噶赶集M二手list
    'ganjim': '977', //噶赶集M二手list
    'yqm': '978', //yaoqingma
    'payredbag': '979', //hongbao
    '58applbytop': '980', //58app列表页顶通
    'outsidett': '981', //外部渠道今日头条
    'outsidegdt': '982', //外部渠道广点通
    'outsideqt': '983' //外部渠道其他
};
var versionConf = {
	ios : "1.0.3",
	pub_time_ios : "2015/10/13",
	android : "3.3.1",
	pub_time_android : "2017/6/27"
};

var websiteConf = {};
var URLdata = {};
getUserData();

websiteConf.url_ios = "https://itunes.apple.com/cn/app/id1002355194";
if ('zhuanzhuanSourceFrom' in URLdata && URLdata.zhuanzhuanSourceFrom != '') {
    var _num = parseInt(URLdata.zhuanzhuanSourceFrom, 10);
    if (!isNaN(_num)) {
        websiteConf.url_android = "https://sdl.58cdn.com.cn/zhuanzhuan/android/" + versionConf.android + "/zhuanzhuan_market_" + _num + ".apk";
    } else if (channelConf[URLdata.zhuanzhuanSourceFrom] != undefined) {
        websiteConf.url_android = "https://sdl.58cdn.com.cn/zhuanzhuan/android/" + versionConf.android + "/zhuanzhuan_market_" + channelConf[URLdata.zhuanzhuanSourceFrom] + ".apk";
    } else {
        websiteConf.url_android = "https://sdl.58cdn.com.cn/zhuanzhuan/android/" + versionConf.android + "/zhuanzhuan_market_923.apk";
    }
} else if ('from' in URLdata && URLdata.from != '') {
    var _from = parseInt(URLdata.from, 10);
    if (!isNaN(_from)) {
        websiteConf.url_android = "https://sdl.58cdn.com.cn/zhuanzhuan/android/" + versionConf.android + "/zhuanzhuan_market_" + _from + ".apk";
    } else if (channelConf[URLdata.from] != undefined) {
        websiteConf.url_android = "https://sdl.58cdn.com.cn/zhuanzhuan/android/" + versionConf.android + "/zhuanzhuan_market_" + channelConf[URLdata.from] + ".apk";
    } else {
        websiteConf.url_android = "https://sdl.58cdn.com.cn/zhuanzhuan/android/" + versionConf.android + "/zhuanzhuan_market_923.apk";
    }
} else {
    websiteConf.url_android = "https://sdl.58cdn.com.cn/zhuanzhuan/android/" + versionConf.android + "/zhuanzhuan_market_923.apk";
}

function getUserData() {
    var userData = decodeURIComponent(location.search).replace("?", "");
    var userData_arry = userData.split("&");
    if (userData_arry.length > 0) {
        for (var i = 0; i < userData_arry.length; i++) {
            var Varry = userData_arry[i].split("=");
            URLdata[Varry[0]] = Varry[1];
        }
    }
}
