function scControlVisibilityCondition(controlID, conditions, relation) {
    wp.customize.control(controlID, function(control) {
        var setVisibility = function() {
                var temp = !0;
                switch (relation) {
                    case "OR":
                        temp = !1;
                        for (var i = 0; i < conditions.length; i++) wp.customize(conditions[i].setting, function(setting) {
                            0 == temp && setting.get() == conditions[i].value && (temp = !0, i = conditions.length)
                        });
                        break;
                    case "AND":
                        temp = !0;
                        for (var i = 0; i < conditions.length; i++) wp.customize(conditions[i].setting, function(setting) {
                            1 == temp && setting.get() != conditions[i].value && (temp = !1, i = conditions.length)
                        })
                }
                return temp
            },
            setActiveState = function() {
                control.active.set(setVisibility())
            };
        conditions.forEach(function(condition) {
            wp.customize(condition.setting, function(setting) {
                setting.bind(setActiveState)
            })
        }), control.active.validate = setVisibility, control.active.set(setVisibility())
    })
}