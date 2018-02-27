// JavaScript Document
;
(function ($) {
    $.fn.extend({
        'gogoImg': function (option) {
            //设置参数
            var defort = {
                ctrlId: 'ctrlbox', // 控制栏	
                ifAuto: true, // 是否自动滚屏
                path: true, // 滚动方向
                onClass: 'on', // 控制 当前的特殊样式
                st: 500, // 滚屏时间
                autoTime: 3000, // 自动滚屏间隔
                prevBtn: '',
                nextBtn: ''
            }
            var op = $.extend({}, defort, option);

            //var
            var _this = $(this),
                    ul = _this.children('ul'),
                    li = ul.children('li'),
                    l = li.length,
                    ctrl = $('#' + op.ctrlId),
                    w = li.outerWidth(true),
                    h = li.outerHeight(true),
                    leg = op.path ? w : h,
                    auto, index = 1;


            //function
            var addList = function () {
                for (var i = 0; i < l; i++) {
                    ctrl.append('<b></b>');
                }
            }
            var setStyle = function () {
                _this.css({'position': 'relative'});
                ul.css({'position': 'absolute'});
                if (op.path) {
                    ul.css({'width': '999em', 'height': h});
                } else {
                    ul.css({'width': w, 'height': '999em'});
                }
            }
            var imgGo = function (id, callback) {
                var l = (-1) * (parseInt(id) - 1) * leg;
                var p = op.path ? {'left': l} : {'top': l};
                var fn = callback || function () {
                };
                ctrl.children('b').removeClass(op.onClass).eq(id - 1).addClass(op.onClass);
                ul.stop().animate(p, op.st, function () {
                    fn();

                });
            }
            var checkId = function () {
                if (index > l)
                    index = 1;
                if (index < 1)
                    index = 1;
            }
            var autoFn = function () {
                index++;
                checkId();
                imgGo(index);
            }

            //run
            addList();
            setStyle();
            ctrl.children('b').mouseenter(function () {
                index = $(this).prevAll('b').length + 1;
                imgGo(index);
            });

            _this.hover(function () {
                if (op.ifAuto)
                    clearInterval(auto);
            }, function () {
                if (op.ifAuto)
                    auto = setInterval(autoFn, op.autoTime);
            })
            ctrl.hover(function () {
                if (op.ifAuto)
                    clearInterval(auto);
            }, function () {
                if (op.ifAuto)
                    auto = setInterval(autoFn, op.autoTime);
            });
            $(op.nextBtn).hover(function () {
                if (op.ifAuto)
                    clearInterval(auto);
            }, function () {
                if (op.ifAuto)
                    auto = setInterval(autoFn, op.autoTime);
            });
            $(op.prevBtn).hover(function () {
                if (op.ifAuto)
                    clearInterval(auto);
            }, function () {
                if (op.ifAuto)
                    auto = setInterval(autoFn, op.autoTime);
            });
            $(op.prevBtn).click(function () {
                index--;
                checkId();
                imgGo(index);
                return false
            });
            $(op.nextBtn).click(function () {
                index++;
                checkId();
                imgGo(index);
                return false
            });

            if (op.ifAuto)
                auto = setInterval(autoFn, op.autoTime);
            imgGo(1);
        }
    });
})(jQuery)