! function (e) {
    function t(i) {
        if (n[i]) return n[i].exports;
        var r = n[i] = {
            i: i,
            l: !1,
            exports: {}
        };
        return e[i].call(r.exports, r, r.exports, t), r.l = !0, r.exports
    }
    var n = {};
    t.m = e, t.c = n, t.d = function (e, n, i) {
        t.o(e, n) || Object.defineProperty(e, n, {
            configurable: !1,
            enumerable: !0,
            get: i
        })
    }, t.n = function (e) {
        var n = e && e.__esModule ? function () {
            return e.default
        } : function () {
            return e
        };
        return t.d(n, "a", n), n
    }, t.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, t.p = "", t(t.s = 5)
}([, , , , , function (e, t, n) {
    n(6), n(11), e.exports = n(12)
}, function (e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var i = n(10),
        r = n.n(i);
    window.Choices = n(7), window.Cleave = n(8), window.flatpickr = n(9), r.a.replace()
}, function (e, t, n) {
    ! function (t, n) {
        e.exports = n()
    }(0, function () {
        return function (e) {
            function t(i) {
                if (n[i]) return n[i].exports;
                var r = n[i] = {
                    exports: {},
                    id: i,
                    loaded: !1
                };
                return e[i].call(r.exports, r, r.exports, t), r.loaded = !0, r.exports
            }
            var n = {};
            return t.m = e, t.c = n, t.p = "/assets/scripts/dist/", t(0)
        }([function (e, t, n) {
            e.exports = n(1)
        }, function (e, t, n) {
            "use strict";

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }

            function r(e, t, n) {
                return t in e ? Object.defineProperty(e, t, {
                    value: n,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : e[t] = n, e
            }

            function o(e) {
                if (Array.isArray(e)) {
                    for (var t = 0, n = Array(e.length); t < e.length; t++) n[t] = e[t];
                    return n
                }
                return Array.from(e)
            }
            var a = function () {
                    function e(e, t) {
                        for (var n = 0; n < t.length; n++) {
                            var i = t[n];
                            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                        }
                    }
                    return function (t, n, i) {
                        return n && e(t.prototype, n), i && e(t, i), t
                    }
                }(),
                l = i(n(2)),
                s = i(n(3)),
                c = i(n(4)),
                u = n(30),
                h = n(31);
            n(32);
            var d = function () {
                function e() {
                    var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "[data-choice]",
                        n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                    if (function (e, t) {
                            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                        }(this, e), (0, h.isType)("String", t)) {
                        var i = document.querySelectorAll(t);
                        if (i.length > 1)
                            for (var r = 1; r < i.length; r++) {
                                new e(i[r], n)
                            }
                    }
                    var o = {
                        silent: !1,
                        items: [],
                        choices: [],
                        renderChoiceLimit: -1,
                        maxItemCount: -1,
                        addItems: !0,
                        removeItems: !0,
                        removeItemButton: !1,
                        editItems: !1,
                        duplicateItems: !0,
                        delimiter: ",",
                        paste: !0,
                        searchEnabled: !0,
                        searchChoices: !0,
                        searchFloor: 1,
                        searchResultLimit: 4,
                        searchFields: ["label", "value"],
                        position: "auto",
                        resetScrollPosition: !0,
                        regexFilter: null,
                        shouldSort: !0,
                        shouldSortItems: !1,
                        sortFilter: h.sortByAlpha,
                        placeholder: !0,
                        placeholderValue: null,
                        searchPlaceholderValue: null,
                        prependValue: null,
                        appendValue: null,
                        renderSelectedChoices: "auto",
                        loadingText: "Loading...",
                        noResultsText: "No results found",
                        noChoicesText: "No choices to choose from",
                        itemSelectText: "Press to select",
                        addItemText: function (e) {
                            return 'Press Enter to add <b>"' + e + '"</b>'
                        },
                        maxItemText: function (e) {
                            return "Only " + e + " values can be added."
                        },
                        uniqueItemText: "Only unique values can be added.",
                        classNames: {
                            containerOuter: "choices",
                            containerInner: "choices__inner",
                            input: "choices__input",
                            inputCloned: "choices__input--cloned",
                            list: "choices__list",
                            listItems: "choices__list--multiple",
                            listSingle: "choices__list--single",
                            listDropdown: "choices__list--dropdown",
                            item: "choices__item",
                            itemSelectable: "choices__item--selectable",
                            itemDisabled: "choices__item--disabled",
                            itemChoice: "choices__item--choice",
                            placeholder: "choices__placeholder",
                            group: "choices__group",
                            groupHeading: "choices__heading",
                            button: "choices__button",
                            activeState: "is-active",
                            focusState: "is-focused",
                            openState: "is-open",
                            disabledState: "is-disabled",
                            highlightedState: "is-highlighted",
                            hiddenState: "is-hidden",
                            flippedState: "is-flipped",
                            loadingState: "is-loading",
                            noResults: "has-no-results",
                            noChoices: "has-no-choices"
                        },
                        fuseOptions: {
                            include: "score"
                        },
                        callbackOnInit: null,
                        callbackOnCreateTemplates: null
                    };
                    if (this.idNames = {
                            itemChoice: "item-choice"
                        }, this.config = (0, h.extend)(o, n), "auto" !== this.config.renderSelectedChoices && "always" !== this.config.renderSelectedChoices && (this.config.silent, this.config.renderSelectedChoices = "auto"), this.store = new c.default(this.render), this.initialised = !1, this.currentState = {}, this.prevState = {}, this.currentValue = "", this.element = t, this.passedElement = (0, h.isType)("String", t) ? document.querySelector(t) : t, this.passedElement) {
                        this.isTextElement = "text" === this.passedElement.type, this.isSelectOneElement = "select-one" === this.passedElement.type, this.isSelectMultipleElement = "select-multiple" === this.passedElement.type, this.isSelectElement = this.isSelectOneElement || this.isSelectMultipleElement, this.isValidElementType = this.isTextElement || this.isSelectElement, this.isIe11 = !(!navigator.userAgent.match(/Trident/) || !navigator.userAgent.match(/rv[ :]11/)), this.isScrollingOnIe = !1, !0 === this.config.shouldSortItems && this.isSelectOneElement && this.config.silent, this.highlightPosition = 0, this.canSearch = this.config.searchEnabled, this.placeholder = !1, this.isSelectOneElement || (this.placeholder = !!this.config.placeholder && (this.config.placeholderValue || this.passedElement.getAttribute("placeholder"))), this.presetChoices = this.config.choices, this.presetItems = this.config.items, this.passedElement.value && (this.presetItems = this.presetItems.concat(this.passedElement.value.split(this.config.delimiter))), this.baseId = (0, h.generateId)(this.passedElement, "choices-"), this.render = this.render.bind(this), this._onFocus = this._onFocus.bind(this), this._onBlur = this._onBlur.bind(this), this._onKeyUp = this._onKeyUp.bind(this), this._onKeyDown = this._onKeyDown.bind(this), this._onClick = this._onClick.bind(this), this._onTouchMove = this._onTouchMove.bind(this), this._onTouchEnd = this._onTouchEnd.bind(this), this._onMouseDown = this._onMouseDown.bind(this), this._onMouseOver = this._onMouseOver.bind(this), this._onPaste = this._onPaste.bind(this), this._onInput = this._onInput.bind(this), this.wasTap = !0;
                        "classList" in document.documentElement || this.config.silent;
                        if ((0, h.isElement)(this.passedElement) && this.isValidElementType) {
                            if ("active" === this.passedElement.getAttribute("data-choice")) return;
                            this.init()
                        } else this.config.silent
                    } else this.config.silent
                }
                return a(e, [{
                    key: "init",
                    value: function () {
                        if (!0 !== this.initialised) {
                            var e = this.config.callbackOnInit;
                            this.initialised = !0, this._createTemplates(), this._createInput(), this.store.subscribe(this.render), this.render(), this._addEventListeners(), e && (0, h.isType)("Function", e) && e.call(this)
                        }
                    }
                }, {
                    key: "destroy",
                    value: function () {
                        if (!1 !== this.initialised) {
                            this._removeEventListeners(), this.passedElement.classList.remove(this.config.classNames.input, this.config.classNames.hiddenState), this.passedElement.removeAttribute("tabindex");
                            var e = this.passedElement.getAttribute("data-choice-orig-style");
                            Boolean(e) ? (this.passedElement.removeAttribute("data-choice-orig-style"), this.passedElement.setAttribute("style", e)) : this.passedElement.removeAttribute("style"), this.passedElement.removeAttribute("aria-hidden"), this.passedElement.removeAttribute("data-choice"), this.passedElement.value = this.passedElement.value, this.containerOuter.parentNode.insertBefore(this.passedElement, this.containerOuter), this.containerOuter.parentNode.removeChild(this.containerOuter), this.clearStore(), this.config.templates = null, this.initialised = !1
                        }
                    }
                }, {
                    key: "renderGroups",
                    value: function (e, t, n) {
                        var i = this,
                            r = n || document.createDocumentFragment(),
                            o = this.config.sortFilter;
                        return this.config.shouldSort && e.sort(o), e.forEach(function (e) {
                            var n = t.filter(function (t) {
                                return i.isSelectOneElement ? t.groupId === e.id : t.groupId === e.id && !t.selected
                            });
                            if (n.length >= 1) {
                                var o = i._getTemplate("choiceGroup", e);
                                r.appendChild(o), i.renderChoices(n, r, !0)
                            }
                        }), r
                    }
                }, {
                    key: "renderChoices",
                    value: function (e, t) {
                        var n = this,
                            i = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
                            r = t || document.createDocumentFragment(),
                            a = this.config,
                            l = a.renderSelectedChoices,
                            s = a.searchResultLimit,
                            c = a.renderChoiceLimit,
                            u = this.isSearching ? h.sortByScore : this.config.sortFilter,
                            d = function (e) {
                                if ("auto" !== l || n.isSelectOneElement || !e.selected) {
                                    var t = n._getTemplate("choice", e);
                                    r.appendChild(t)
                                }
                            },
                            p = e;
                        "auto" !== l || this.isSelectOneElement || (p = e.filter(function (e) {
                            return !e.selected
                        }));
                        var f = p.reduce(function (e, t) {
                                return t.placeholder ? e.placeholderChoices.push(t) : e.normalChoices.push(t), e
                            }, {
                                placeholderChoices: [],
                                normalChoices: []
                            }),
                            y = f.placeholderChoices,
                            m = f.normalChoices;
                        (this.config.shouldSort || this.isSearching) && m.sort(u);
                        var g = p.length,
                            v = [].concat(o(y), o(m));
                        this.isSearching ? g = s : c > 0 && !i && (g = c);
                        for (var x = 0; x < g; x++) v[x] && d(v[x]);
                        return r
                    }
                }, {
                    key: "renderItems",
                    value: function (e) {
                        var t = this,
                            n = (arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null) || document.createDocumentFragment();
                        if (this.config.shouldSortItems && !this.isSelectOneElement && e.sort(this.config.sortFilter), this.isTextElement) {
                            var i = this.store.getItemsReducedToValues(e).join(this.config.delimiter);
                            this.passedElement.setAttribute("value", i), this.passedElement.value = i
                        } else {
                            var r = document.createDocumentFragment();
                            e.forEach(function (e) {
                                var n = t._getTemplate("option", e);
                                r.appendChild(n)
                            }), this.passedElement.innerHTML = "", this.passedElement.appendChild(r)
                        }
                        return e.forEach(function (e) {
                            var i = t._getTemplate("item", e);
                            n.appendChild(i)
                        }), n
                    }
                }, {
                    key: "render",
                    value: function () {
                        if (this.currentState = this.store.getState(), this.currentState !== this.prevState) {
                            if ((this.currentState.choices !== this.prevState.choices || this.currentState.groups !== this.prevState.groups || this.currentState.items !== this.prevState.items) && this.isSelectElement) {
                                var e = this.store.getGroupsFilteredByActive(),
                                    t = this.store.getChoicesFilteredByActive(),
                                    n = document.createDocumentFragment();
                                this.choiceList.innerHTML = "", this.config.resetScrollPosition && (this.choiceList.scrollTop = 0), e.length >= 1 && !0 !== this.isSearching ? n = this.renderGroups(e, t, n) : t.length >= 1 && (n = this.renderChoices(t, n));
                                var i = this.store.getItemsFilteredByActive(),
                                    r = this._canAddItem(i, this.input.value);
                                if (n.childNodes && n.childNodes.length > 0) r.response ? (this.choiceList.appendChild(n), this._highlightChoice()) : this.choiceList.appendChild(this._getTemplate("notice", r.notice));
                                else {
                                    var o = void 0,
                                        a = void 0;
                                    this.isSearching ? (a = (0, h.isType)("Function", this.config.noResultsText) ? this.config.noResultsText() : this.config.noResultsText, o = this._getTemplate("notice", a, "no-results")) : (a = (0, h.isType)("Function", this.config.noChoicesText) ? this.config.noChoicesText() : this.config.noChoicesText, o = this._getTemplate("notice", a, "no-choices")), this.choiceList.appendChild(o)
                                }
                            }
                            if (this.currentState.items !== this.prevState.items) {
                                var l = this.store.getItemsFilteredByActive();
                                if (this.itemList.innerHTML = "", l && l) {
                                    var s = this.renderItems(l);
                                    s.childNodes && this.itemList.appendChild(s)
                                }
                            }
                            this.prevState = this.currentState
                        }
                    }
                }, {
                    key: "highlightItem",
                    value: function (e) {
                        var t = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1];
                        if (!e) return this;
                        var n = e.id,
                            i = e.groupId,
                            r = i >= 0 ? this.store.getGroupById(i) : null;
                        return this.store.dispatch((0, u.highlightItem)(n, !0)), t && (r && r.value ? (0, h.triggerEvent)(this.passedElement, "highlightItem", {
                            id: n,
                            value: e.value,
                            label: e.label,
                            groupValue: r.value
                        }) : (0, h.triggerEvent)(this.passedElement, "highlightItem", {
                            id: n,
                            value: e.value,
                            label: e.label
                        })), this
                    }
                }, {
                    key: "unhighlightItem",
                    value: function (e) {
                        if (!e) return this;
                        var t = e.id,
                            n = e.groupId,
                            i = n >= 0 ? this.store.getGroupById(n) : null;
                        return this.store.dispatch((0, u.highlightItem)(t, !1)), i && i.value ? (0, h.triggerEvent)(this.passedElement, "unhighlightItem", {
                            id: t,
                            value: e.value,
                            label: e.label,
                            groupValue: i.value
                        }) : (0, h.triggerEvent)(this.passedElement, "unhighlightItem", {
                            id: t,
                            value: e.value,
                            label: e.label
                        }), this
                    }
                }, {
                    key: "highlightAll",
                    value: function () {
                        var e = this;
                        return this.store.getItems().forEach(function (t) {
                            e.highlightItem(t)
                        }), this
                    }
                }, {
                    key: "unhighlightAll",
                    value: function () {
                        var e = this;
                        return this.store.getItems().forEach(function (t) {
                            e.unhighlightItem(t)
                        }), this
                    }
                }, {
                    key: "removeItemsByValue",
                    value: function (e) {
                        var t = this;
                        if (!e || !(0, h.isType)("String", e)) return this;
                        return this.store.getItemsFilteredByActive().forEach(function (n) {
                            n.value === e && t._removeItem(n)
                        }), this
                    }
                }, {
                    key: "removeActiveItems",
                    value: function (e) {
                        var t = this;
                        return this.store.getItemsFilteredByActive().forEach(function (n) {
                            n.active && e !== n.id && t._removeItem(n)
                        }), this
                    }
                }, {
                    key: "removeHighlightedItems",
                    value: function () {
                        var e = this,
                            t = arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
                        return this.store.getItemsFilteredByActive().forEach(function (n) {
                            n.highlighted && n.active && (e._removeItem(n), t && e._triggerChange(n.value))
                        }), this
                    }
                }, {
                    key: "showDropdown",
                    value: function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0],
                            t = document.body,
                            n = document.documentElement,
                            i = Math.max(t.scrollHeight, t.offsetHeight, n.clientHeight, n.scrollHeight, n.offsetHeight);
                        this.containerOuter.classList.add(this.config.classNames.openState), this.containerOuter.setAttribute("aria-expanded", "true"), this.dropdown.classList.add(this.config.classNames.activeState), this.dropdown.setAttribute("aria-expanded", "true");
                        var r = this.dropdown.getBoundingClientRect(),
                            o = Math.ceil(r.top + window.scrollY + this.dropdown.offsetHeight),
                            a = !1;
                        return "auto" === this.config.position ? a = o >= i : "top" === this.config.position && (a = !0), a && this.containerOuter.classList.add(this.config.classNames.flippedState), e && this.canSearch && document.activeElement !== this.input && this.input.focus(), (0, h.triggerEvent)(this.passedElement, "showDropdown", {}), this
                    }
                }, {
                    key: "hideDropdown",
                    value: function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0],
                            t = this.containerOuter.classList.contains(this.config.classNames.flippedState);
                        return this.containerOuter.classList.remove(this.config.classNames.openState), this.containerOuter.setAttribute("aria-expanded", "false"), this.dropdown.classList.remove(this.config.classNames.activeState), this.dropdown.setAttribute("aria-expanded", "false"), t && this.containerOuter.classList.remove(this.config.classNames.flippedState), e && this.canSearch && document.activeElement === this.input && this.input.blur(), (0, h.triggerEvent)(this.passedElement, "hideDropdown", {}), this
                    }
                }, {
                    key: "toggleDropdown",
                    value: function () {
                        return this.dropdown.classList.contains(this.config.classNames.activeState) ? this.hideDropdown() : this.showDropdown(!0), this
                    }
                }, {
                    key: "getValue",
                    value: function () {
                        var e = this,
                            t = arguments.length > 0 && void 0 !== arguments[0] && arguments[0],
                            n = [];
                        return this.store.getItemsFilteredByActive().forEach(function (i) {
                            e.isTextElement ? n.push(t ? i.value : i) : i.active && n.push(t ? i.value : i)
                        }), this.isSelectOneElement ? n[0] : n
                    }
                }, {
                    key: "setValue",
                    value: function (e) {
                        var t = this;
                        if (!0 === this.initialised) {
                            var n = [].concat(o(e)),
                                i = function (e) {
                                    var n = (0, h.getType)(e);
                                    if ("Object" === n) {
                                        if (!e.value) return;
                                        t.isTextElement ? t._addItem(e.value, e.label, e.id, void 0, e.customProperties, e.placeholder) : t._addChoice(e.value, e.label, !0, !1, -1, e.customProperties, e.placeholder)
                                    } else "String" === n && (t.isTextElement ? t._addItem(e) : t._addChoice(e, e, !0, !1, -1, null))
                                };
                            n.length > 1 ? n.forEach(function (e) {
                                i(e)
                            }) : i(n[0])
                        }
                        return this
                    }
                }, {
                    key: "setValueByChoice",
                    value: function (e) {
                        var t = this;
                        if (!this.isTextElement) {
                            var n = this.store.getChoices();
                            ((0, h.isType)("Array", e) ? e : [e]).forEach(function (e) {
                                var i = n.find(function (t) {
                                    return t.value === e
                                });
                                i ? i.selected ? t.config.silent : t._addItem(i.value, i.label, i.id, i.groupId, i.customProperties, i.placeholder, i.keyCode) : t.config.silent
                            })
                        }
                        return this
                    }
                }, {
                    key: "setChoices",
                    value: function (e, t, n) {
                        var i = this,
                            r = arguments.length > 3 && void 0 !== arguments[3] && arguments[3];
                        if (!0 === this.initialised && this.isSelectElement) {
                            if (!(0, h.isType)("Array", e) || !t) return this;
                            r && this._clearChoices(), e && e.length && (this.containerOuter.classList.remove(this.config.classNames.loadingState), e.forEach(function (e) {
                                e.choices ? i._addGroup(e, e.id || null, t, n) : i._addChoice(e[t], e[n], e.selected, e.disabled, void 0, e.customProperties, e.placeholder)
                            }))
                        }
                        return this
                    }
                }, {
                    key: "clearStore",
                    value: function () {
                        return this.store.dispatch((0, u.clearAll)()), this
                    }
                }, {
                    key: "clearInput",
                    value: function () {
                        return this.input.value && (this.input.value = ""), this.isSelectOneElement || this._setInputWidth(), !this.isTextElement && this.config.searchEnabled && (this.isSearching = !1, this.store.dispatch((0, u.activateChoices)(!0))), this
                    }
                }, {
                    key: "enable",
                    value: function () {
                        if (this.initialised) {
                            this.passedElement.disabled = !1;
                            this.containerOuter.classList.contains(this.config.classNames.disabledState) && (this._addEventListeners(), this.passedElement.removeAttribute("disabled"), this.input.removeAttribute("disabled"), this.containerOuter.classList.remove(this.config.classNames.disabledState), this.containerOuter.removeAttribute("aria-disabled"), this.isSelectOneElement && this.containerOuter.setAttribute("tabindex", "0"))
                        }
                        return this
                    }
                }, {
                    key: "disable",
                    value: function () {
                        if (this.initialised) {
                            this.passedElement.disabled = !0;
                            !this.containerOuter.classList.contains(this.config.classNames.disabledState) && (this._removeEventListeners(), this.passedElement.setAttribute("disabled", ""), this.input.setAttribute("disabled", ""), this.containerOuter.classList.add(this.config.classNames.disabledState), this.containerOuter.setAttribute("aria-disabled", "true"), this.isSelectOneElement && this.containerOuter.setAttribute("tabindex", "-1"))
                        }
                        return this
                    }
                }, {
                    key: "ajax",
                    value: function (e) {
                        var t = this;
                        return !0 === this.initialised && this.isSelectElement && (requestAnimationFrame(function () {
                            t._handleLoadingState(!0)
                        }), e(this._ajaxCallback())), this
                    }
                }, {
                    key: "_triggerChange",
                    value: function (e) {
                        e && (0, h.triggerEvent)(this.passedElement, "change", {
                            value: e
                        })
                    }
                }, {
                    key: "_handleButtonAction",
                    value: function (e, t) {
                        if (e && t && this.config.removeItems && this.config.removeItemButton) {
                            var n = t.parentNode.getAttribute("data-id"),
                                i = e.find(function (e) {
                                    return e.id === parseInt(n, 10)
                                });
                            this._removeItem(i), this._triggerChange(i.value), this.isSelectOneElement && this._selectPlaceholderChoice()
                        }
                    }
                }, {
                    key: "_selectPlaceholderChoice",
                    value: function () {
                        var e = this.store.getPlaceholderChoice();
                        e && (this._addItem(e.value, e.label, e.id, e.groupId, null, e.placeholder), this._triggerChange(e.value))
                    }
                }, {
                    key: "_handleItemAction",
                    value: function (e, t) {
                        var n = this,
                            i = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
                        if (e && t && this.config.removeItems && !this.isSelectOneElement) {
                            var r = t.getAttribute("data-id");
                            e.forEach(function (e) {
                                e.id !== parseInt(r, 10) || e.highlighted ? i || e.highlighted && n.unhighlightItem(e) : n.highlightItem(e)
                            }), document.activeElement !== this.input && this.input.focus()
                        }
                    }
                }, {
                    key: "_handleChoiceAction",
                    value: function (e, t) {
                        if (e && t) {
                            var n = t.getAttribute("data-id"),
                                i = this.store.getChoiceById(n),
                                r = e[0] && e[0].keyCode ? e[0].keyCode : null,
                                o = this.dropdown.classList.contains(this.config.classNames.activeState);
                            if (i.keyCode = r, (0, h.triggerEvent)(this.passedElement, "choice", {
                                    choice: i
                                }), i && !i.selected && !i.disabled) {
                                this._canAddItem(e, i.value).response && (this._addItem(i.value, i.label, i.id, i.groupId, i.customProperties, i.placeholder, i.keyCode), this._triggerChange(i.value))
                            }
                            this.clearInput(), o && this.isSelectOneElement && (this.hideDropdown(), this.containerOuter.focus())
                        }
                    }
                }, {
                    key: "_handleBackspace",
                    value: function (e) {
                        if (this.config.removeItems && e) {
                            var t = e[e.length - 1],
                                n = e.some(function (e) {
                                    return e.highlighted
                                });
                            this.config.editItems && !n && t ? (this.input.value = t.value, this._setInputWidth(), this._removeItem(t), this._triggerChange(t.value)) : (n || this.highlightItem(t, !1), this.removeHighlightedItems(!0))
                        }
                    }
                }, {
                    key: "_canAddItem",
                    value: function (e, t) {
                        var n = !0,
                            i = (0, h.isType)("Function", this.config.addItemText) ? this.config.addItemText(t) : this.config.addItemText;
                        (this.isSelectMultipleElement || this.isTextElement) && this.config.maxItemCount > 0 && this.config.maxItemCount <= e.length && (n = !1, i = (0, h.isType)("Function", this.config.maxItemText) ? this.config.maxItemText(this.config.maxItemCount) : this.config.maxItemText), this.isTextElement && this.config.addItems && n && this.config.regexFilter && (n = this._regexFilter(t));
                        return !e.some(function (e) {
                            return (0, h.isType)("String", t) ? e.value === t.trim() : e.value === t
                        }) || this.config.duplicateItems || this.isSelectOneElement || !n || (n = !1, i = (0, h.isType)("Function", this.config.uniqueItemText) ? this.config.uniqueItemText(t) : this.config.uniqueItemText), {
                            response: n,
                            notice: i
                        }
                    }
                }, {
                    key: "_handleLoadingState",
                    value: function () {
                        var e = !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0],
                            t = this.itemList.querySelector("." + this.config.classNames.placeholder);
                        e ? (this.containerOuter.classList.add(this.config.classNames.loadingState), this.containerOuter.setAttribute("aria-busy", "true"), this.isSelectOneElement ? t ? t.innerHTML = this.config.loadingText : (t = this._getTemplate("placeholder", this.config.loadingText), this.itemList.appendChild(t)) : this.input.placeholder = this.config.loadingText) : (this.containerOuter.classList.remove(this.config.classNames.loadingState), this.isSelectOneElement ? t.innerHTML = this.placeholder || "" : this.input.placeholder = this.placeholder || "")
                    }
                }, {
                    key: "_ajaxCallback",
                    value: function () {
                        var e = this;
                        return function (t, n, i) {
                            if (t && n) {
                                var r = (0, h.isType)("Object", t) ? [t] : t;
                                r && (0, h.isType)("Array", r) && r.length ? (e._handleLoadingState(!1), r.forEach(function (t) {
                                    if (t.choices) {
                                        var r = t.id || null;
                                        e._addGroup(t, r, n, i)
                                    } else e._addChoice(t[n], t[i], t.selected, t.disabled, void 0, t.customProperties, t.placeholder)
                                }), e.isSelectOneElement && e._selectPlaceholderChoice()) : e._handleLoadingState(!1), e.containerOuter.removeAttribute("aria-busy")
                            }
                        }
                    }
                }, {
                    key: "_searchChoices",
                    value: function (e) {
                        var t = (0, h.isType)("String", e) ? e.trim() : e,
                            n = (0, h.isType)("String", this.currentValue) ? this.currentValue.trim() : this.currentValue;
                        if (t.length >= 1 && t !== n + " ") {
                            var i = this.store.getSearchableChoices(),
                                r = t,
                                o = (0, h.isType)("Array", this.config.searchFields) ? this.config.searchFields : [this.config.searchFields],
                                a = Object.assign(this.config.fuseOptions, {
                                    keys: o
                                }),
                                s = new l.default(i, a).search(r);
                            return this.currentValue = t, this.highlightPosition = 0, this.isSearching = !0, this.store.dispatch((0, u.filterChoices)(s)), s.length
                        }
                        return 0
                    }
                }, {
                    key: "_handleSearch",
                    value: function (e) {
                        if (e) {
                            var t = this.store.getChoices().some(function (e) {
                                return !e.active
                            });
                            if (this.input === document.activeElement)
                                if (e && e.length >= this.config.searchFloor) {
                                    var n = 0;
                                    this.config.searchChoices && (n = this._searchChoices(e)), (0, h.triggerEvent)(this.passedElement, "search", {
                                        value: e,
                                        resultCount: n
                                    })
                                } else t && (this.isSearching = !1, this.store.dispatch((0, u.activateChoices)(!0)))
                        }
                    }
                }, {
                    key: "_addEventListeners",
                    value: function () {
                        document.addEventListener("keyup", this._onKeyUp), document.addEventListener("keydown", this._onKeyDown), document.addEventListener("click", this._onClick), document.addEventListener("touchmove", this._onTouchMove), document.addEventListener("touchend", this._onTouchEnd), document.addEventListener("mousedown", this._onMouseDown), document.addEventListener("mouseover", this._onMouseOver), this.isSelectOneElement && (this.containerOuter.addEventListener("focus", this._onFocus), this.containerOuter.addEventListener("blur", this._onBlur)), this.input.addEventListener("input", this._onInput), this.input.addEventListener("paste", this._onPaste), this.input.addEventListener("focus", this._onFocus), this.input.addEventListener("blur", this._onBlur)
                    }
                }, {
                    key: "_removeEventListeners",
                    value: function () {
                        document.removeEventListener("keyup", this._onKeyUp), document.removeEventListener("keydown", this._onKeyDown), document.removeEventListener("click", this._onClick), document.removeEventListener("touchmove", this._onTouchMove), document.removeEventListener("touchend", this._onTouchEnd), document.removeEventListener("mousedown", this._onMouseDown), document.removeEventListener("mouseover", this._onMouseOver), this.isSelectOneElement && (this.containerOuter.removeEventListener("focus", this._onFocus), this.containerOuter.removeEventListener("blur", this._onBlur)), this.input.removeEventListener("input", this._onInput), this.input.removeEventListener("paste", this._onPaste), this.input.removeEventListener("focus", this._onFocus), this.input.removeEventListener("blur", this._onBlur)
                    }
                }, {
                    key: "_setInputWidth",
                    value: function () {
                        this.placeholder ? this.input.value && this.input.value.length >= this.placeholder.length / 1.25 && (this.input.style.width = (0, h.getWidthOfInput)(this.input)) : this.input.style.width = (0, h.getWidthOfInput)(this.input)
                    }
                }, {
                    key: "_onKeyDown",
                    value: function (e) {
                        var t, n = this;
                        if (e.target === this.input || this.containerOuter.contains(e.target)) {
                            var i = e.target,
                                o = this.store.getItemsFilteredByActive(),
                                a = this.input === document.activeElement,
                                l = this.dropdown.classList.contains(this.config.classNames.activeState),
                                s = this.itemList && this.itemList.children,
                                c = String.fromCharCode(e.keyCode),
                                u = e.ctrlKey || e.metaKey;
                            this.isTextElement || !/[a-zA-Z0-9-_ ]/.test(c) || l || this.showDropdown(!0), this.canSearch = this.config.searchEnabled;
                            var d = function () {
                                    if (n.isTextElement && i.value) {
                                        var t = n.input.value;
                                        n._canAddItem(o, t).response && (l && n.hideDropdown(), n._addItem(t), n._triggerChange(t), n.clearInput())
                                    }
                                    if (i.hasAttribute("data-button") && (n._handleButtonAction(o, i), e.preventDefault()), l) {
                                        e.preventDefault();
                                        var r = n.dropdown.querySelector("." + n.config.classNames.highlightedState);
                                        r && (o[0] && (o[0].keyCode = 13), n._handleChoiceAction(o, r))
                                    } else n.isSelectOneElement && (l || (n.showDropdown(!0), e.preventDefault()))
                                },
                                p = function () {
                                    l && (n.toggleDropdown(), n.containerOuter.focus())
                                },
                                f = function () {
                                    if (l || n.isSelectOneElement) {
                                        l || n.showDropdown(!0), n.canSearch = !1;
                                        var t = 40 === e.keyCode || 34 === e.keyCode ? 1 : -1,
                                            i = void 0;
                                        if (e.metaKey || 34 === e.keyCode || 33 === e.keyCode) i = t > 0 ? Array.from(n.dropdown.querySelectorAll("[data-choice-selectable]")).pop() : n.dropdown.querySelector("[data-choice-selectable]");
                                        else {
                                            var r = n.dropdown.querySelector("." + n.config.classNames.highlightedState);
                                            i = r ? (0, h.getAdjacentEl)(r, "[data-choice-selectable]", t) : n.dropdown.querySelector("[data-choice-selectable]")
                                        }
                                        i && ((0, h.isScrolledIntoView)(i, n.choiceList, t) || n._scrollToChoice(i, t), n._highlightChoice(i)), e.preventDefault()
                                    }
                                },
                                y = function () {
                                    !a || e.target.value || n.isSelectOneElement || (n._handleBackspace(o), e.preventDefault())
                                },
                                m = (t = {}, r(t, 65, function () {
                                    u && s && (n.canSearch = !1, n.config.removeItems && !n.input.value && n.input === document.activeElement && n.highlightAll())
                                }), r(t, 13, d), r(t, 27, p), r(t, 38, f), r(t, 33, f), r(t, 40, f), r(t, 34, f), r(t, 8, y), r(t, 46, y), t);
                            m[e.keyCode] && m[e.keyCode]()
                        }
                    }
                }, {
                    key: "_onKeyUp",
                    value: function (e) {
                        if (e.target === this.input) {
                            var t = this.input.value,
                                n = this.store.getItemsFilteredByActive(),
                                i = this._canAddItem(n, t);
                            if (this.isTextElement) {
                                var r = this.dropdown.classList.contains(this.config.classNames.activeState);
                                if (t) {
                                    if (i.notice) {
                                        var o = this._getTemplate("notice", i.notice);
                                        this.dropdown.innerHTML = o.outerHTML
                                    }!0 === i.response ? r || this.showDropdown() : !i.notice && r && this.hideDropdown()
                                } else r && this.hideDropdown()
                            } else {
                                46 !== e.keyCode && 8 !== e.keyCode || e.target.value ? this.canSearch && i.response && this._handleSearch(this.input.value) : !this.isTextElement && this.isSearching && (this.isSearching = !1, this.store.dispatch((0, u.activateChoices)(!0)))
                            }
                            this.canSearch = this.config.searchEnabled
                        }
                    }
                }, {
                    key: "_onInput",
                    value: function () {
                        this.isSelectOneElement || this._setInputWidth()
                    }
                }, {
                    key: "_onTouchMove",
                    value: function () {
                        !0 === this.wasTap && (this.wasTap = !1)
                    }
                }, {
                    key: "_onTouchEnd",
                    value: function (e) {
                        var t = e.target || e.touches[0].target,
                            n = this.dropdown.classList.contains(this.config.classNames.activeState);
                        !0 === this.wasTap && this.containerOuter.contains(t) && (t !== this.containerOuter && t !== this.containerInner || this.isSelectOneElement || (this.isTextElement ? document.activeElement !== this.input && this.input.focus() : n || this.showDropdown(!0)), e.stopPropagation()), this.wasTap = !0
                    }
                }, {
                    key: "_onMouseDown",
                    value: function (e) {
                        var t = e.target;
                        if (t === this.choiceList && this.isIe11 && (this.isScrollingOnIe = !0), this.containerOuter.contains(t) && t !== this.input) {
                            var n = void 0,
                                i = this.store.getItemsFilteredByActive(),
                                r = e.shiftKey;
                            (n = (0, h.findAncestorByAttrName)(t, "data-button")) ? this._handleButtonAction(i, n): (n = (0, h.findAncestorByAttrName)(t, "data-item")) ? this._handleItemAction(i, n, r) : (n = (0, h.findAncestorByAttrName)(t, "data-choice")) && this._handleChoiceAction(i, n), e.preventDefault()
                        }
                    }
                }, {
                    key: "_onClick",
                    value: function (e) {
                        var t = e.target,
                            n = this.dropdown.classList.contains(this.config.classNames.activeState),
                            i = this.store.getItemsFilteredByActive();
                        if (this.containerOuter.contains(t)) t.hasAttribute("data-button") && this._handleButtonAction(i, t), n ? this.isSelectOneElement && t !== this.input && !this.dropdown.contains(t) && this.hideDropdown(!0) : this.isTextElement ? document.activeElement !== this.input && this.input.focus() : this.canSearch ? this.showDropdown(!0) : (this.showDropdown(), this.containerOuter.focus());
                        else {
                            i.some(function (e) {
                                return e.highlighted
                            }) && this.unhighlightAll(), this.containerOuter.classList.remove(this.config.classNames.focusState), n && this.hideDropdown()
                        }
                    }
                }, {
                    key: "_onMouseOver",
                    value: function (e) {
                        (e.target === this.dropdown || this.dropdown.contains(e.target)) && e.target.hasAttribute("data-choice") && this._highlightChoice(e.target)
                    }
                }, {
                    key: "_onPaste",
                    value: function (e) {
                        e.target !== this.input || this.config.paste || e.preventDefault()
                    }
                }, {
                    key: "_onFocus",
                    value: function (e) {
                        var t = this,
                            n = e.target;
                        if (this.containerOuter.contains(n)) {
                            var i = this.dropdown.classList.contains(this.config.classNames.activeState);
                            ({
                                text: function () {
                                    n === t.input && t.containerOuter.classList.add(t.config.classNames.focusState)
                                },
                                "select-one": function () {
                                    t.containerOuter.classList.add(t.config.classNames.focusState), n === t.input && (i || t.showDropdown())
                                },
                                "select-multiple": function () {
                                    n === t.input && (t.containerOuter.classList.add(t.config.classNames.focusState), i || t.showDropdown(!0))
                                }
                            })[this.passedElement.type]()
                        }
                    }
                }, {
                    key: "_onBlur",
                    value: function (e) {
                        var t = this,
                            n = e.target;
                        if (this.containerOuter.contains(n) && !this.isScrollingOnIe) {
                            var i = this.store.getItemsFilteredByActive(),
                                r = this.dropdown.classList.contains(this.config.classNames.activeState),
                                o = i.some(function (e) {
                                    return e.highlighted
                                });
                            ({
                                text: function () {
                                    n === t.input && (t.containerOuter.classList.remove(t.config.classNames.focusState), o && t.unhighlightAll(), r && t.hideDropdown())
                                },
                                "select-one": function () {
                                    t.containerOuter.classList.remove(t.config.classNames.focusState), n === t.containerOuter && r && !t.canSearch && t.hideDropdown(), n === t.input && r && t.hideDropdown()
                                },
                                "select-multiple": function () {
                                    n === t.input && (t.containerOuter.classList.remove(t.config.classNames.focusState), r && t.hideDropdown(), o && t.unhighlightAll())
                                }
                            })[this.passedElement.type]()
                        } else this.isScrollingOnIe = !1, this.input.focus()
                    }
                }, {
                    key: "_regexFilter",
                    value: function (e) {
                        if (!e) return !1;
                        var t = this.config.regexFilter;
                        return new RegExp(t.source, "i").test(e)
                    }
                }, {
                    key: "_scrollToChoice",
                    value: function (e, t) {
                        var n = this;
                        if (e) {
                            var i = this.choiceList.offsetHeight,
                                r = e.offsetHeight,
                                o = e.offsetTop + r,
                                a = this.choiceList.scrollTop + i,
                                l = t > 0 ? this.choiceList.scrollTop + o - a : e.offsetTop;
                            requestAnimationFrame(function (e) {
                                ! function e() {
                                    var i = n.choiceList.scrollTop,
                                        r = !1,
                                        o = void 0,
                                        a = void 0;
                                    t > 0 ? (o = (l - i) / 4, a = o > 1 ? o : 1, n.choiceList.scrollTop = i + a, i < l && (r = !0)) : (o = (i - l) / 4, a = o > 1 ? o : 1, n.choiceList.scrollTop = i - a, i > l && (r = !0)), r && requestAnimationFrame(function (n) {
                                        e(n, l, t)
                                    })
                                }()
                            })
                        }
                    }
                }, {
                    key: "_highlightChoice",
                    value: function () {
                        var e = this,
                            t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                            n = Array.from(this.dropdown.querySelectorAll("[data-choice-selectable]")),
                            i = t;
                        if (n && n.length) {
                            Array.from(this.dropdown.querySelectorAll("." + this.config.classNames.highlightedState)).forEach(function (t) {
                                t.classList.remove(e.config.classNames.highlightedState), t.setAttribute("aria-selected", "false")
                            }), i ? this.highlightPosition = n.indexOf(i) : (i = n.length > this.highlightPosition ? n[this.highlightPosition] : n[n.length - 1]) || (i = n[0]), i.classList.add(this.config.classNames.highlightedState), i.setAttribute("aria-selected", "true"), this.containerOuter.setAttribute("aria-activedescendant", i.id)
                        }
                    }
                }, {
                    key: "_addItem",
                    value: function (e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                            n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : -1,
                            i = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : -1,
                            r = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : null,
                            o = arguments.length > 5 && void 0 !== arguments[5] && arguments[5],
                            a = arguments.length > 6 && void 0 !== arguments[6] ? arguments[6] : null,
                            l = (0, h.isType)("String", e) ? e.trim() : e,
                            s = a,
                            c = this.store.getItems(),
                            d = t || l,
                            p = parseInt(n, 10) || -1,
                            f = i >= 0 ? this.store.getGroupById(i) : null,
                            y = c ? c.length + 1 : 1;
                        return this.config.prependValue && (l = this.config.prependValue + l.toString()), this.config.appendValue && (l += this.config.appendValue.toString()), this.store.dispatch((0, u.addItem)(l, d, y, p, i, r, o, s)), this.isSelectOneElement && this.removeActiveItems(y), f && f.value ? (0, h.triggerEvent)(this.passedElement, "addItem", {
                            id: y,
                            value: l,
                            label: d,
                            groupValue: f.value,
                            keyCode: s
                        }) : (0, h.triggerEvent)(this.passedElement, "addItem", {
                            id: y,
                            value: l,
                            label: d,
                            keyCode: s
                        }), this
                    }
                }, {
                    key: "_removeItem",
                    value: function (e) {
                        if (!e || !(0, h.isType)("Object", e)) return this;
                        var t = e.id,
                            n = e.value,
                            i = e.label,
                            r = e.choiceId,
                            o = e.groupId,
                            a = o >= 0 ? this.store.getGroupById(o) : null;
                        return this.store.dispatch((0, u.removeItem)(t, r)), a && a.value ? (0, h.triggerEvent)(this.passedElement, "removeItem", {
                            id: t,
                            value: n,
                            label: i,
                            groupValue: a.value
                        }) : (0, h.triggerEvent)(this.passedElement, "removeItem", {
                            id: t,
                            value: n,
                            label: i
                        }), this
                    }
                }, {
                    key: "_addChoice",
                    value: function (e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                            n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
                            i = arguments.length > 3 && void 0 !== arguments[3] && arguments[3],
                            r = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : -1,
                            o = arguments.length > 5 && void 0 !== arguments[5] ? arguments[5] : null,
                            a = arguments.length > 6 && void 0 !== arguments[6] && arguments[6],
                            l = arguments.length > 7 && void 0 !== arguments[7] ? arguments[7] : null;
                        if (void 0 !== e && null !== e) {
                            var s = this.store.getChoices(),
                                c = t || e,
                                h = s ? s.length + 1 : 1,
                                d = this.baseId + "-" + this.idNames.itemChoice + "-" + h;
                            this.store.dispatch((0, u.addChoice)(e, c, h, r, i, d, o, a, l)), n && this._addItem(e, c, h, void 0, o, a, l)
                        }
                    }
                }, {
                    key: "_clearChoices",
                    value: function () {
                        this.store.dispatch((0, u.clearChoices)())
                    }
                }, {
                    key: "_addGroup",
                    value: function (e, t) {
                        var n = this,
                            i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : "value",
                            r = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : "label",
                            o = (0, h.isType)("Object", e) ? e.choices : Array.from(e.getElementsByTagName("OPTION")),
                            a = t || Math.floor((new Date).valueOf() * Math.random()),
                            l = !!e.disabled && e.disabled;
                        o ? (this.store.dispatch((0, u.addGroup)(e.label, a, !0, l)), o.forEach(function (e) {
                            var t = e.disabled || e.parentNode && e.parentNode.disabled;
                            n._addChoice(e[i], (0, h.isType)("Object", e) ? e[r] : e.innerHTML, e.selected, t, a, e.customProperties, e.placeholder)
                        })) : this.store.dispatch((0, u.addGroup)(e.label, e.id, !1, e.disabled))
                    }
                }, {
                    key: "_getTemplate",
                    value: function (e) {
                        if (!e) return null;
                        for (var t = this.config.templates, n = arguments.length, i = Array(n > 1 ? n - 1 : 0), r = 1; r < n; r++) i[r - 1] = arguments[r];
                        return t[e].apply(t, i)
                    }
                }, {
                    key: "_createTemplates",
                    value: function () {
                        var e = this,
                            t = this.config.classNames,
                            n = {
                                containerOuter: function (n) {
                                    return (0, h.strToEl)('\n          <div\n            class="' + t.containerOuter + '"\n            ' + (e.isSelectElement ? e.config.searchEnabled ? 'role="combobox" aria-autocomplete="list"' : 'role="listbox"' : "") + '\n            data-type="' + e.passedElement.type + '"\n            ' + (e.isSelectOneElement ? 'tabindex="0"' : "") + '\n            aria-haspopup="true"\n            aria-expanded="false"\n            dir="' + n + '"\n            >\n          </div>\n        ')
                                },
                                containerInner: function () {
                                    return (0, h.strToEl)('\n          <div class="' + t.containerInner + '"></div>\n        ')
                                },
                                itemList: function () {
                                    var n, i = (0, s.default)(t.list, (n = {}, r(n, t.listSingle, e.isSelectOneElement), r(n, t.listItems, !e.isSelectOneElement), n));
                                    return (0, h.strToEl)('\n          <div class="' + i + '"></div>\n        ')
                                },
                                placeholder: function (e) {
                                    return (0, h.strToEl)('\n          <div class="' + t.placeholder + '">\n            ' + e + "\n          </div>\n        ")
                                },
                                item: function (n) {
                                    var i, o = (0, s.default)(t.item, (i = {}, r(i, t.highlightedState, n.highlighted), r(i, t.itemSelectable, !n.highlighted), r(i, t.placeholder, n.placeholder), i));
                                    if (e.config.removeItemButton) {
                                        var a;
                                        return o = (0, s.default)(t.item, (a = {}, r(a, t.highlightedState, n.highlighted), r(a, t.itemSelectable, !n.disabled), r(a, t.placeholder, n.placeholder), a)), (0, h.strToEl)('\n            <div\n              class="' + o + '"\n              data-item\n              data-id="' + n.id + '"\n              data-value="' + n.value + '"\n              data-deletable\n              ' + (n.active ? 'aria-selected="true"' : "") + "\n              " + (n.disabled ? 'aria-disabled="true"' : "") + "\n              >\n              " + n.label + '\x3c!--\n           --\x3e<button\n                type="button"\n                class="' + t.button + '"\n                data-button\n                aria-label="Remove item: \'' + n.value + "'\"\n                >\n                Remove item\n              </button>\n            </div>\n          ")
                                    }
                                    return (0, h.strToEl)('\n          <div\n            class="' + o + '"\n            data-item\n            data-id="' + n.id + '"\n            data-value="' + n.value + '"\n            ' + (n.active ? 'aria-selected="true"' : "") + "\n            " + (n.disabled ? 'aria-disabled="true"' : "") + "\n            >\n            " + n.label + "\n          </div>\n        ")
                                },
                                choiceList: function () {
                                    return (0, h.strToEl)('\n          <div\n            class="' + t.list + '"\n            dir="ltr"\n            role="listbox"\n            ' + (e.isSelectOneElement ? "" : 'aria-multiselectable="true"') + "\n            >\n          </div>\n        ")
                                },
                                choiceGroup: function (e) {
                                    var n = (0, s.default)(t.group, r({}, t.itemDisabled, e.disabled));
                                    return (0, h.strToEl)('\n          <div\n            class="' + n + '"\n            data-group\n            data-id="' + e.id + '"\n            data-value="' + e.value + '"\n            role="group"\n            ' + (e.disabled ? 'aria-disabled="true"' : "") + '\n            >\n            <div class="' + t.groupHeading + '">' + e.value + "</div>\n          </div>\n        ")
                                },
                                choice: function (n) {
                                    var i, o = (0, s.default)(t.item, t.itemChoice, (i = {}, r(i, t.itemDisabled, n.disabled), r(i, t.itemSelectable, !n.disabled), r(i, t.placeholder, n.placeholder), i));
                                    return (0, h.strToEl)('\n          <div\n            class="' + o + '"\n            data-select-text="' + e.config.itemSelectText + '"\n            data-choice\n            data-id="' + n.id + '"\n            data-value="' + n.value + '"\n            ' + (n.disabled ? 'data-choice-disabled aria-disabled="true"' : "data-choice-selectable") + '\n            id="' + n.elementId + '"\n            ' + (n.groupId > 0 ? 'role="treeitem"' : 'role="option"') + "\n            >\n            " + n.label + "\n          </div>\n        ")
                                },
                                input: function () {
                                    var e = (0, s.default)(t.input, t.inputCloned);
                                    return (0, h.strToEl)('\n          <input\n            type="text"\n            class="' + e + '"\n            autocomplete="off"\n            autocapitalize="off"\n            spellcheck="false"\n            role="textbox"\n            aria-autocomplete="list"\n            >\n        ')
                                },
                                dropdown: function () {
                                    var e = (0, s.default)(t.list, t.listDropdown);
                                    return (0, h.strToEl)('\n          <div\n            class="' + e + '"\n            aria-expanded="false"\n            >\n          </div>\n        ')
                                },
                                notice: function (e) {
                                    var n, i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
                                        o = (0, s.default)(t.item, t.itemChoice, (n = {}, r(n, t.noResults, "no-results" === i), r(n, t.noChoices, "no-choices" === i), n));
                                    return (0, h.strToEl)('\n          <div class="' + o + '">\n            ' + e + "\n          </div>\n        ")
                                },
                                option: function (e) {
                                    return (0, h.strToEl)('\n          <option value="' + e.value + '" selected>' + e.label + "</option>\n        ")
                                }
                            },
                            i = this.config.callbackOnCreateTemplates,
                            o = {};
                        i && (0, h.isType)("Function", i) && (o = i.call(this, h.strToEl)), this.config.templates = (0, h.extend)(n, o)
                    }
                }, {
                    key: "_createInput",
                    value: function () {
                        var e = this,
                            t = this.passedElement.getAttribute("dir") || "ltr",
                            n = this._getTemplate("containerOuter", t),
                            i = this._getTemplate("containerInner"),
                            r = this._getTemplate("itemList"),
                            o = this._getTemplate("choiceList"),
                            a = this._getTemplate("input"),
                            l = this._getTemplate("dropdown");
                        this.containerOuter = n, this.containerInner = i, this.input = a, this.choiceList = o, this.itemList = r, this.dropdown = l, this.passedElement.classList.add(this.config.classNames.input, this.config.classNames.hiddenState), this.passedElement.tabIndex = "-1";
                        var s = this.passedElement.getAttribute("style");
                        if (Boolean(s) && this.passedElement.setAttribute("data-choice-orig-style", s), this.passedElement.setAttribute("style", "display:none;"), this.passedElement.setAttribute("aria-hidden", "true"), this.passedElement.setAttribute("data-choice", "active"), (0, h.wrap)(this.passedElement, i), (0, h.wrap)(i, n), this.isSelectOneElement ? a.placeholder = this.config.searchPlaceholderValue || "" : this.placeholder && (a.placeholder = this.placeholder, a.style.width = (0, h.getWidthOfInput)(a)), this.config.addItems || this.disable(), n.appendChild(i), n.appendChild(l), i.appendChild(r), this.isTextElement || l.appendChild(o), this.isSelectMultipleElement || this.isTextElement ? i.appendChild(a) : this.canSearch && l.insertBefore(a, l.firstChild), this.isSelectElement) {
                            var c = Array.from(this.passedElement.getElementsByTagName("OPTGROUP"));
                            if (this.highlightPosition = 0, this.isSearching = !1, c && c.length) c.forEach(function (t) {
                                e._addGroup(t, t.id || null)
                            });
                            else {
                                var u = Array.from(this.passedElement.options),
                                    d = this.config.sortFilter,
                                    p = this.presetChoices;
                                u.forEach(function (e) {
                                    p.push({
                                        value: e.value,
                                        label: e.innerHTML,
                                        selected: e.selected,
                                        disabled: e.disabled || e.parentNode.disabled,
                                        placeholder: e.hasAttribute("placeholder")
                                    })
                                }), this.config.shouldSort && p.sort(d);
                                var f = p.some(function (e) {
                                    return e.selected
                                });
                                p.forEach(function (t, n) {
                                    if (e.isSelectOneElement) {
                                        var i = f || !f && n > 0;
                                        e._addChoice(t.value, t.label, !i || t.selected, !!i && t.disabled, void 0, t.customProperties, t.placeholder)
                                    } else e._addChoice(t.value, t.label, t.selected, t.disabled, void 0, t.customProperties, t.placeholder)
                                })
                            }
                        } else this.isTextElement && this.presetItems.forEach(function (t) {
                            var n = (0, h.getType)(t);
                            if ("Object" === n) {
                                if (!t.value) return;
                                e._addItem(t.value, t.label, t.id, void 0, t.customProperties, t.placeholder)
                            } else "String" === n && e._addItem(t)
                        })
                    }
                }]), e
            }();
            e.exports = d
        }, function (e, t, n) {
            ! function (t) {
                "use strict";

                function n() {}

                function i(e, t) {
                    var n;
                    this.list = e, this.options = t = t || {};
                    for (n in l) l.hasOwnProperty(n) && ("boolean" == typeof l[n] ? this.options[n] = n in t ? t[n] : l[n] : this.options[n] = t[n] || l[n])
                }

                function r(e, t, n) {
                    var i, a, l, s, c, u;
                    if (t) {
                        if (-1 !== (l = t.indexOf(".")) ? (i = t.slice(0, l), a = t.slice(l + 1)) : i = t, null !== (s = e[i]) && void 0 !== s)
                            if (a || "string" != typeof s && "number" != typeof s)
                                if (o(s))
                                    for (c = 0, u = s.length; c < u; c++) r(s[c], a, n);
                                else a && r(s, a, n);
                        else n.push(s)
                    } else n.push(e);
                    return n
                }

                function o(e) {
                    return "[object Array]" === Object.prototype.toString.call(e)
                }

                function a(e, t) {
                    t = t || {}, this.options = t, this.options.location = t.location || a.defaultOptions.location, this.options.distance = "distance" in t ? t.distance : a.defaultOptions.distance, this.options.threshold = "threshold" in t ? t.threshold : a.defaultOptions.threshold, this.options.maxPatternLength = t.maxPatternLength || a.defaultOptions.maxPatternLength, this.pattern = t.caseSensitive ? e : e.toLowerCase(), this.patternLen = e.length, this.patternLen <= this.options.maxPatternLength && (this.matchmask = 1 << this.patternLen - 1, this.patternAlphabet = this._calculatePatternAlphabet())
                }
                var l = {
                    id: null,
                    caseSensitive: !1,
                    include: [],
                    shouldSort: !0,
                    searchFn: a,
                    sortFn: function (e, t) {
                        return e.score - t.score
                    },
                    getFn: r,
                    keys: [],
                    verbose: !1,
                    tokenize: !1,
                    matchAllTokens: !1,
                    tokenSeparator: / +/g,
                    minMatchCharLength: 1,
                    findAllMatches: !1
                };
                i.VERSION = "2.7.3", i.prototype.set = function (e) {
                    return this.list = e, e
                }, i.prototype.search = function (e) {
                    this.options.verbose && n("\nSearch term:", e, "\n"), this.pattern = e, this.results = [], this.resultMap = {}, this._keyMap = null, this._prepareSearchers(), this._startSearch(), this._computeScore(), this._sort();
                    return this._format()
                }, i.prototype._prepareSearchers = function () {
                    var e = this.options,
                        t = this.pattern,
                        n = e.searchFn,
                        i = t.split(e.tokenSeparator),
                        r = 0,
                        o = i.length;
                    if (this.options.tokenize)
                        for (this.tokenSearchers = []; r < o; r++) this.tokenSearchers.push(new n(i[r], e));
                    this.fullSeacher = new n(t, e)
                }, i.prototype._startSearch = function () {
                    var e, t, n, i, r = this.options.getFn,
                        o = this.list,
                        a = o.length,
                        l = this.options.keys,
                        s = l.length,
                        c = null;
                    if ("string" == typeof o[0])
                        for (n = 0; n < a; n++) this._analyze("", o[n], n, n);
                    else
                        for (this._keyMap = {}, n = 0; n < a; n++)
                            for (c = o[n], i = 0; i < s; i++) {
                                if ("string" != typeof (e = l[i])) {
                                    if (t = 1 - e.weight || 1, this._keyMap[e.name] = {
                                            weight: t
                                        }, e.weight <= 0 || e.weight > 1) throw new Error("Key weight has to be > 0 and <= 1");
                                    e = e.name
                                } else this._keyMap[e] = {
                                    weight: 1
                                };
                                this._analyze(e, r(c, e, []), c, n)
                            }
                }, i.prototype._analyze = function (e, t, i, r) {
                    var a, l, s, c, u, h, d, p, f, y, m, g, v, x, b, w = this.options,
                        M = !1;
                    if (void 0 !== t && null !== t) {
                        l = [];
                        var C = 0;
                        if ("string" == typeof t) {
                            if (a = t.split(w.tokenSeparator), w.verbose && n("---------\nKey:", e), this.options.tokenize) {
                                for (x = 0; x < this.tokenSearchers.length; x++) {
                                    for (p = this.tokenSearchers[x], w.verbose && n("Pattern:", p.pattern), f = [], g = !1, b = 0; b < a.length; b++) {
                                        y = a[b];
                                        var E = {};
                                        (m = p.search(y)).isMatch ? (E[y] = m.score, M = !0, g = !0, l.push(m.score)) : (E[y] = 1, this.options.matchAllTokens || l.push(1)), f.push(E)
                                    }
                                    g && C++, w.verbose && n("Token scores:", f)
                                }
                                for (c = l[0], h = l.length, x = 1; x < h; x++) c += l[x];
                                c /= h, w.verbose && n("Token score average:", c)
                            }
                            d = this.fullSeacher.search(t), w.verbose && n("Full text score:", d.score), u = d.score, void 0 !== c && (u = (u + c) / 2), w.verbose && n("Score average:", u), v = !this.options.tokenize || !this.options.matchAllTokens || C >= this.tokenSearchers.length, w.verbose && n("Check Matches", v), (M || d.isMatch) && v && ((s = this.resultMap[r]) ? s.output.push({
                                key: e,
                                score: u,
                                matchedIndices: d.matchedIndices
                            }) : (this.resultMap[r] = {
                                item: i,
                                output: [{
                                    key: e,
                                    score: u,
                                    matchedIndices: d.matchedIndices
                                }]
                            }, this.results.push(this.resultMap[r])))
                        } else if (o(t))
                            for (x = 0; x < t.length; x++) this._analyze(e, t[x], i, r)
                    }
                }, i.prototype._computeScore = function () {
                    var e, t, i, r, o, a, l, s, c, u = this._keyMap,
                        h = this.results;
                    for (this.options.verbose && n("\n\nComputing score:\n"), e = 0; e < h.length; e++) {
                        for (i = 0, o = (r = h[e].output).length, s = 1, t = 0; t < o; t++) a = r[t].score, l = u ? u[r[t].key].weight : 1, c = a * l, 1 !== l ? s = Math.min(s, c) : (i += c, r[t].nScore = c);
                        h[e].score = 1 === s ? i / o : s, this.options.verbose && n(h[e])
                    }
                }, i.prototype._sort = function () {
                    var e = this.options;
                    e.shouldSort && (e.verbose && n("\n\nSorting...."), this.results.sort(e.sortFn))
                }, i.prototype._format = function () {
                    var e, t, i, r, o = this.options,
                        a = o.getFn,
                        l = [],
                        s = this.results,
                        c = o.include;
                    for (o.verbose && n("\n\nOutput:\n\n", s), i = o.id ? function (e) {
                            s[e].item = a(s[e].item, o.id, [])[0]
                        } : function () {}, r = function (e) {
                            var t, n, i, r, o, a = s[e];
                            if (c.length > 0) {
                                if (t = {
                                        item: a.item
                                    }, -1 !== c.indexOf("matches"))
                                    for (i = a.output, t.matches = [], n = 0; n < i.length; n++) r = i[n], o = {
                                        indices: r.matchedIndices
                                    }, r.key && (o.key = r.key), t.matches.push(o); - 1 !== c.indexOf("score") && (t.score = s[e].score)
                            } else t = a.item;
                            return t
                        }, e = 0, t = s.length; e < t; e++) i(e), l.push(r(e));
                    return l
                }, a.defaultOptions = {
                    location: 0,
                    distance: 100,
                    threshold: .6,
                    maxPatternLength: 32
                }, a.prototype._calculatePatternAlphabet = function () {
                    var e = {},
                        t = 0;
                    for (t = 0; t < this.patternLen; t++) e[this.pattern.charAt(t)] = 0;
                    for (t = 0; t < this.patternLen; t++) e[this.pattern.charAt(t)] |= 1 << this.pattern.length - t - 1;
                    return e
                }, a.prototype._bitapScore = function (e, t) {
                    var n = e / this.patternLen,
                        i = Math.abs(this.options.location - t);
                    return this.options.distance ? n + i / this.options.distance : i ? 1 : n
                }, a.prototype.search = function (e) {
                    var t, n, i, r, o, a, l, s, c, u, h, d, p, f, y, m, g, v, x, b, w, M, C, E = this.options;
                    if (e = E.caseSensitive ? e : e.toLowerCase(), this.pattern === e) return {
                        isMatch: !0,
                        score: 0,
                        matchedIndices: [
                            [0, e.length - 1]
                        ]
                    };
                    if (this.patternLen > E.maxPatternLength) {
                        if (v = e.match(new RegExp(this.pattern.replace(E.tokenSeparator, "|"))), x = !!v)
                            for (w = [], t = 0, M = v.length; t < M; t++) C = v[t], w.push([e.indexOf(C), C.length - 1]);
                        return {
                            isMatch: x,
                            score: x ? .5 : 1,
                            matchedIndices: w
                        }
                    }
                    for (r = E.findAllMatches, o = E.location, i = e.length, a = E.threshold, l = e.indexOf(this.pattern, o), b = [], t = 0; t < i; t++) b[t] = 0;
                    for (-1 != l && (a = Math.min(this._bitapScore(0, l), a), -1 != (l = e.lastIndexOf(this.pattern, o + this.patternLen)) && (a = Math.min(this._bitapScore(0, l), a))), l = -1, m = 1, g = [], u = this.patternLen + i, t = 0; t < this.patternLen; t++) {
                        for (s = 0, c = u; s < c;) this._bitapScore(t, o + c) <= a ? s = c : u = c, c = Math.floor((u - s) / 2 + s);
                        for (u = c, h = Math.max(1, o - c + 1), d = r ? i : Math.min(o + c, i) + this.patternLen, (p = Array(d + 2))[d + 1] = (1 << t) - 1, n = d; n >= h; n--)
                            if ((y = this.patternAlphabet[e.charAt(n - 1)]) && (b[n - 1] = 1), p[n] = (p[n + 1] << 1 | 1) & y, 0 !== t && (p[n] |= (f[n + 1] | f[n]) << 1 | 1 | f[n + 1]), p[n] & this.matchmask && (m = this._bitapScore(t, n - 1)) <= a) {
                                if (a = m, l = n - 1, g.push(l), l <= o) break;
                                h = Math.max(1, 2 * o - l)
                            } if (this._bitapScore(t + 1, o) > a) break;
                        f = p
                    }
                    return w = this._getMatchedIndices(b), {
                        isMatch: l >= 0,
                        score: 0 === m ? .001 : m,
                        matchedIndices: w
                    }
                }, a.prototype._getMatchedIndices = function (e) {
                    for (var t, n = [], i = -1, r = -1, o = 0, a = e.length; o < a; o++)(t = e[o]) && -1 === i ? i = o : t || -1 === i || ((r = o - 1) - i + 1 >= this.options.minMatchCharLength && n.push([i, r]), i = -1);
                    return e[o - 1] && o - 1 - i + 1 >= this.options.minMatchCharLength && n.push([i, o - 1]), n
                }, e.exports = i
            }()
        }, function (e, t, n) {
            var i, r;
            ! function () {
                "use strict";

                function n() {
                    for (var e = [], t = 0; t < arguments.length; t++) {
                        var i = arguments[t];
                        if (i) {
                            var r = typeof i;
                            if ("string" === r || "number" === r) e.push(i);
                            else if (Array.isArray(i)) e.push(n.apply(null, i));
                            else if ("object" === r)
                                for (var a in i) o.call(i, a) && i[a] && e.push(a)
                        }
                    }
                    return e.join(" ")
                }
                var o = {}.hasOwnProperty;
                void 0 !== e && e.exports ? e.exports = n : (i = [], void 0 !== (r = function () {
                    return n
                }.apply(t, i)) && (e.exports = r))
            }()
        }, function (e, t, n) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var i = function () {
                    function e(e, t) {
                        for (var n = 0; n < t.length; n++) {
                            var i = t[n];
                            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                        }
                    }
                    return function (t, n, i) {
                        return n && e(t.prototype, n), i && e(t, i), t
                    }
                }(),
                r = n(5),
                o = function (e) {
                    return e && e.__esModule ? e : {
                        default: e
                    }
                }(n(26)),
                a = function () {
                    function e() {
                        (function (e, t) {
                            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                        })(this, e), this.store = (0, r.createStore)(o.default, window.devToolsExtension ? window.devToolsExtension() : void 0)
                    }
                    return i(e, [{
                        key: "getState",
                        value: function () {
                            return this.store.getState()
                        }
                    }, {
                        key: "dispatch",
                        value: function (e) {
                            this.store.dispatch(e)
                        }
                    }, {
                        key: "subscribe",
                        value: function (e) {
                            this.store.subscribe(e)
                        }
                    }, {
                        key: "getItems",
                        value: function () {
                            return this.store.getState().items
                        }
                    }, {
                        key: "getItemsFilteredByActive",
                        value: function () {
                            return this.getItems().filter(function (e) {
                                return !0 === e.active
                            }, [])
                        }
                    }, {
                        key: "getItemsReducedToValues",
                        value: function () {
                            return (arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : this.getItems()).reduce(function (e, t) {
                                return e.push(t.value), e
                            }, [])
                        }
                    }, {
                        key: "getChoices",
                        value: function () {
                            return this.store.getState().choices
                        }
                    }, {
                        key: "getChoicesFilteredByActive",
                        value: function () {
                            return this.getChoices().filter(function (e) {
                                return !0 === e.active
                            })
                        }
                    }, {
                        key: "getChoicesFilteredBySelectable",
                        value: function () {
                            return this.getChoices().filter(function (e) {
                                return !0 !== e.disabled
                            })
                        }
                    }, {
                        key: "getSearchableChoices",
                        value: function () {
                            return this.getChoicesFilteredBySelectable().filter(function (e) {
                                return !0 !== e.placeholder
                            })
                        }
                    }, {
                        key: "getChoiceById",
                        value: function (e) {
                            if (e) {
                                return this.getChoicesFilteredByActive().find(function (t) {
                                    return t.id === parseInt(e, 10)
                                })
                            }
                            return !1
                        }
                    }, {
                        key: "getGroups",
                        value: function () {
                            return this.store.getState().groups
                        }
                    }, {
                        key: "getGroupsFilteredByActive",
                        value: function () {
                            var e = this.getGroups(),
                                t = this.getChoices();
                            return e.filter(function (e) {
                                var n = !0 === e.active && !1 === e.disabled,
                                    i = t.some(function (e) {
                                        return !0 === e.active && !1 === e.disabled
                                    });
                                return n && i
                            }, [])
                        }
                    }, {
                        key: "getGroupById",
                        value: function (e) {
                            return this.getGroups().find(function (t) {
                                return t.id === e
                            })
                        }
                    }, {
                        key: "getPlaceholderChoice",
                        value: function () {
                            var e = this.getChoices();
                            return [].concat(function (e) {
                                if (Array.isArray(e)) {
                                    for (var t = 0, n = Array(e.length); t < e.length; t++) n[t] = e[t];
                                    return n
                                }
                                return Array.from(e)
                            }(e)).reverse().find(function (e) {
                                return !0 === e.placeholder
                            })
                        }
                    }]), e
                }();
            t.default = a, e.exports = a
        }, function (e, t, n) {
            "use strict";

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            t.__esModule = !0, t.compose = t.applyMiddleware = t.bindActionCreators = t.combineReducers = t.createStore = void 0;
            var r = i(n(6)),
                o = i(n(21)),
                a = i(n(23)),
                l = i(n(24)),
                s = i(n(25));
            i(n(22)), t.createStore = r.default, t.combineReducers = o.default, t.bindActionCreators = a.default, t.applyMiddleware = l.default, t.compose = s.default
        }, function (e, t, n) {
            "use strict";

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }

            function r(e, t, n) {
                function i() {
                    y === f && (y = f.slice())
                }

                function s() {
                    return p
                }

                function c(e) {
                    if ("function" != typeof e) throw new Error("Expected listener to be a function.");
                    var t = !0;
                    return i(), y.push(e),
                        function () {
                            if (t) {
                                t = !1, i();
                                var n = y.indexOf(e);
                                y.splice(n, 1)
                            }
                        }
                }

                function u(e) {
                    if (!(0, o.default)(e)) throw new Error("Actions must be plain objects. Use custom middleware for async actions.");
                    if (void 0 === e.type) throw new Error('Actions may not have an undefined "type" property. Have you misspelled a constant?');
                    if (m) throw new Error("Reducers may not dispatch actions.");
                    try {
                        m = !0, p = d(p, e)
                    } finally {
                        m = !1
                    }
                    for (var t = f = y, n = 0; n < t.length; n++) t[n]();
                    return e
                }
                var h;
                if ("function" == typeof t && void 0 === n && (n = t, t = void 0), void 0 !== n) {
                    if ("function" != typeof n) throw new Error("Expected the enhancer to be a function.");
                    return n(r)(e, t)
                }
                if ("function" != typeof e) throw new Error("Expected the reducer to be a function.");
                var d = e,
                    p = t,
                    f = [],
                    y = f,
                    m = !1;
                return u({
                    type: l.INIT
                }), h = {
                    dispatch: u,
                    subscribe: c,
                    getState: s,
                    replaceReducer: function (e) {
                        if ("function" != typeof e) throw new Error("Expected the nextReducer to be a function.");
                        d = e, u({
                            type: l.INIT
                        })
                    }
                }, h[a.default] = function () {
                    var e, t = c;
                    return e = {
                        subscribe: function (e) {
                            function n() {
                                e.next && e.next(s())
                            }
                            if ("object" != typeof e) throw new TypeError("Expected the observer to be an object.");
                            return n(), {
                                unsubscribe: t(n)
                            }
                        }
                    }, e[a.default] = function () {
                        return this
                    }, e
                }, h
            }
            t.__esModule = !0, t.ActionTypes = void 0, t.default = r;
            var o = i(n(7)),
                a = i(n(17)),
                l = t.ActionTypes = {
                    INIT: "@@redux/INIT"
                }
        }, function (e, t, n) {
            var i = n(8),
                r = n(14),
                o = n(16),
                a = "[object Object]",
                l = Function.prototype,
                s = Object.prototype,
                c = l.toString,
                u = s.hasOwnProperty,
                h = c.call(Object);
            e.exports = function (e) {
                if (!o(e) || i(e) != a) return !1;
                var t = r(e);
                if (null === t) return !0;
                var n = u.call(t, "constructor") && t.constructor;
                return "function" == typeof n && n instanceof n && c.call(n) == h
            }
        }, function (e, t, n) {
            var i = n(9),
                r = n(12),
                o = n(13),
                a = "[object Null]",
                l = "[object Undefined]",
                s = i ? i.toStringTag : void 0;
            e.exports = function (e) {
                return null == e ? void 0 === e ? l : a : s && s in Object(e) ? r(e) : o(e)
            }
        }, function (e, t, n) {
            var i = n(10).Symbol;
            e.exports = i
        }, function (e, t, n) {
            var i = n(11),
                r = "object" == typeof self && self && self.Object === Object && self,
                o = i || r || Function("return this")();
            e.exports = o
        }, function (e, t) {
            (function (t) {
                var n = "object" == typeof t && t && t.Object === Object && t;
                e.exports = n
            }).call(t, function () {
                return this
            }())
        }, function (e, t, n) {
            var i = n(9),
                r = Object.prototype,
                o = r.hasOwnProperty,
                a = r.toString,
                l = i ? i.toStringTag : void 0;
            e.exports = function (e) {
                var t = o.call(e, l),
                    n = e[l];
                try {
                    e[l] = void 0;
                    var i = !0
                } catch (e) {}
                var r = a.call(e);
                return i && (t ? e[l] = n : delete e[l]), r
            }
        }, function (e, t) {
            var n = Object.prototype.toString;
            e.exports = function (e) {
                return n.call(e)
            }
        }, function (e, t, n) {
            var i = n(15)(Object.getPrototypeOf, Object);
            e.exports = i
        }, function (e, t) {
            e.exports = function (e, t) {
                return function (n) {
                    return e(t(n))
                }
            }
        }, function (e, t) {
            e.exports = function (e) {
                return null != e && "object" == typeof e
            }
        }, function (e, t, n) {
            e.exports = n(18)
        }, function (e, t, n) {
            (function (e, i) {
                "use strict";
                Object.defineProperty(t, "__esModule", {
                    value: !0
                });
                var r, o = function (e) {
                    return e && e.__esModule ? e : {
                        default: e
                    }
                }(n(20));
                r = "undefined" != typeof self ? self : "undefined" != typeof window ? window : void 0 !== e ? e : i;
                var a = (0, o.default)(r);
                t.default = a
            }).call(t, function () {
                return this
            }(), n(19)(e))
        }, function (e, t) {
            e.exports = function (e) {
                return e.webpackPolyfill || (e.deprecate = function () {}, e.paths = [], e.children = [], e.webpackPolyfill = 1), e
            }
        }, function (e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function (e) {
                var t, n = e.Symbol;
                return "function" == typeof n ? n.observable ? t = n.observable : (t = n("observable"), n.observable = t) : t = "@@observable", t
            }
        }, function (e, t, n) {
            "use strict";

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }

            function r(e, t) {
                var n = t && t.type;
                return "Given action " + (n && '"' + n.toString() + '"' || "an action") + ', reducer "' + e + '" returned undefined. To ignore an action, you must explicitly return the previous state.'
            }
            t.__esModule = !0, t.default = function (e) {
                for (var t = Object.keys(e), n = {}, i = 0; i < t.length; i++) {
                    var a = t[i];
                    "function" == typeof e[a] && (n[a] = e[a])
                }
                var l, s = Object.keys(n);
                try {
                    ! function (e) {
                        Object.keys(e).forEach(function (t) {
                            var n = e[t];
                            if (void 0 === n(void 0, {
                                    type: o.ActionTypes.INIT
                                })) throw new Error('Reducer "' + t + '" returned undefined during initialization. If the state passed to the reducer is undefined, you must explicitly return the initial state. The initial state may not be undefined.');
                            if (void 0 === n(void 0, {
                                    type: "@@redux/PROBE_UNKNOWN_ACTION_" + Math.random().toString(36).substring(7).split("").join(".")
                                })) throw new Error('Reducer "' + t + "\" returned undefined when probed with a random type. Don't try to handle " + o.ActionTypes.INIT + ' or other actions in "redux/*" namespace. They are considered private. Instead, you must return the current state for any unknown actions, unless it is undefined, in which case you must return the initial state, regardless of the action type. The initial state may not be undefined.')
                        })
                    }(n)
                } catch (e) {
                    l = e
                }
                return function () {
                    var e = arguments.length <= 0 || void 0 === arguments[0] ? {} : arguments[0],
                        t = arguments[1];
                    if (l) throw l;
                    for (var i = !1, o = {}, a = 0; a < s.length; a++) {
                        var c = s[a],
                            u = n[c],
                            h = e[c],
                            d = u(h, t);
                        if (void 0 === d) {
                            var p = r(c, t);
                            throw new Error(p)
                        }
                        o[c] = d, i = i || d !== h
                    }
                    return i ? o : e
                }
            };
            var o = n(6);
            i((i(n(7)), n(22)))
        }, function (e, t) {
            "use strict";
            t.__esModule = !0, t.default = function (e) {
                "undefined" != typeof console && console.error;
                try {
                    throw new Error(e)
                } catch (e) {}
            }
        }, function (e, t) {
            "use strict";

            function n(e, t) {
                return function () {
                    return t(e.apply(void 0, arguments))
                }
            }
            t.__esModule = !0, t.default = function (e, t) {
                if ("function" == typeof e) return n(e, t);
                if ("object" != typeof e || null === e) throw new Error("bindActionCreators expected an object or a function, instead received " + (null === e ? "null" : typeof e) + '. Did you write "import ActionCreators from" instead of "import * as ActionCreators from"?');
                for (var i = Object.keys(e), r = {}, o = 0; o < i.length; o++) {
                    var a = i[o],
                        l = e[a];
                    "function" == typeof l && (r[a] = n(l, t))
                }
                return r
            }
        }, function (e, t, n) {
            "use strict";
            t.__esModule = !0;
            var i = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (e[i] = n[i])
                }
                return e
            };
            t.default = function () {
                for (var e = arguments.length, t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                return function (e) {
                    return function (n, o, a) {
                        var l = e(n, o, a),
                            s = l.dispatch,
                            c = [],
                            u = {
                                getState: l.getState,
                                dispatch: function (e) {
                                    return s(e)
                                }
                            };
                        return c = t.map(function (e) {
                            return e(u)
                        }), s = r.default.apply(void 0, c)(l.dispatch), i({}, l, {
                            dispatch: s
                        })
                    }
                }
            };
            var r = function (e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }(n(25))
        }, function (e, t) {
            "use strict";
            t.__esModule = !0, t.default = function () {
                for (var e = arguments.length, t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                if (0 === t.length) return function (e) {
                    return e
                };
                if (1 === t.length) return t[0];
                var i = t[t.length - 1],
                    r = t.slice(0, -1);
                return function () {
                    return r.reduceRight(function (e, t) {
                        return t(e)
                    }, i.apply(void 0, arguments))
                }
            }
        }, function (e, t, n) {
            "use strict";

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var r = n(5),
                o = i(n(27)),
                a = i(n(28)),
                l = i(n(29)),
                s = (0, r.combineReducers)({
                    items: o.default,
                    groups: a.default,
                    choices: l.default
                });
            t.default = function (e, t) {
                var n = e;
                return "CLEAR_ALL" === t.type && (n = void 0), s(n, t)
            }
        }, function (e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            t.default = function () {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [],
                    t = arguments[1];
                switch (t.type) {
                    case "ADD_ITEM":
                        return [].concat(function (e) {
                            if (Array.isArray(e)) {
                                for (var t = 0, n = Array(e.length); t < e.length; t++) n[t] = e[t];
                                return n
                            }
                            return Array.from(e)
                        }(e), [{
                            id: t.id,
                            choiceId: t.choiceId,
                            groupId: t.groupId,
                            value: t.value,
                            label: t.label,
                            active: !0,
                            highlighted: !1,
                            customProperties: t.customProperties,
                            placeholder: t.placeholder || !1,
                            keyCode: null
                        }]).map(function (e) {
                            return e.highlighted && (e.highlighted = !1), e
                        });
                    case "REMOVE_ITEM":
                        return e.map(function (e) {
                            return e.id === t.id && (e.active = !1), e
                        });
                    case "HIGHLIGHT_ITEM":
                        return e.map(function (e) {
                            return e.id === t.id && (e.highlighted = t.highlighted), e
                        });
                    default:
                        return e
                }
            }
        }, function (e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            t.default = function () {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [],
                    t = arguments[1];
                switch (t.type) {
                    case "ADD_GROUP":
                        return [].concat(function (e) {
                            if (Array.isArray(e)) {
                                for (var t = 0, n = Array(e.length); t < e.length; t++) n[t] = e[t];
                                return n
                            }
                            return Array.from(e)
                        }(e), [{
                            id: t.id,
                            value: t.value,
                            active: t.active,
                            disabled: t.disabled
                        }]);
                    case "CLEAR_CHOICES":
                        return e.groups = [];
                    default:
                        return e
                }
            }
        }, function (e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            t.default = function () {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [],
                    t = arguments[1];
                switch (t.type) {
                    case "ADD_CHOICE":
                        return [].concat(function (e) {
                            if (Array.isArray(e)) {
                                for (var t = 0, n = Array(e.length); t < e.length; t++) n[t] = e[t];
                                return n
                            }
                            return Array.from(e)
                        }(e), [{
                            id: t.id,
                            elementId: t.elementId,
                            groupId: t.groupId,
                            value: t.value,
                            label: t.label || t.value,
                            disabled: t.disabled || !1,
                            selected: !1,
                            active: !0,
                            score: 9999,
                            customProperties: t.customProperties,
                            placeholder: t.placeholder || !1,
                            keyCode: null
                        }]);
                    case "ADD_ITEM":
                        var n = e;
                        return t.activateOptions && (n = e.map(function (e) {
                            return e.active = t.active, e
                        })), t.choiceId > -1 && (n = e.map(function (e) {
                            return e.id === parseInt(t.choiceId, 10) && (e.selected = !0), e
                        })), n;
                    case "REMOVE_ITEM":
                        return t.choiceId > -1 ? e.map(function (e) {
                            return e.id === parseInt(t.choiceId, 10) && (e.selected = !1), e
                        }) : e;
                    case "FILTER_CHOICES":
                        var i = t.results;
                        return e.map(function (e) {
                            return e.active = i.some(function (t) {
                                return t.item.id === e.id && (e.score = t.score, !0)
                            }), e
                        });
                    case "ACTIVATE_CHOICES":
                        return e.map(function (e) {
                            return e.active = t.active, e
                        });
                    case "CLEAR_CHOICES":
                        return e.choices = [];
                    default:
                        return e
                }
            }
        }, function (e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.addItem = function (e, t, n, i, r, o, a, l) {
                return {
                    type: "ADD_ITEM",
                    value: e,
                    label: t,
                    id: n,
                    choiceId: i,
                    groupId: r,
                    customProperties: o,
                    placeholder: a,
                    keyCode: l
                }
            }, t.removeItem = function (e, t) {
                return {
                    type: "REMOVE_ITEM",
                    id: e,
                    choiceId: t
                }
            }, t.highlightItem = function (e, t) {
                return {
                    type: "HIGHLIGHT_ITEM",
                    id: e,
                    highlighted: t
                }
            }, t.addChoice = function (e, t, n, i, r, o, a, l, s) {
                return {
                    type: "ADD_CHOICE",
                    value: e,
                    label: t,
                    id: n,
                    groupId: i,
                    disabled: r,
                    elementId: o,
                    customProperties: a,
                    placeholder: l,
                    keyCode: s
                }
            }, t.filterChoices = function (e) {
                return {
                    type: "FILTER_CHOICES",
                    results: e
                }
            }, t.activateChoices = function () {
                return {
                    type: "ACTIVATE_CHOICES",
                    active: !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0]
                }
            }, t.clearChoices = function () {
                return {
                    type: "CLEAR_CHOICES"
                }
            }, t.addGroup = function (e, t, n, i) {
                return {
                    type: "ADD_GROUP",
                    value: e,
                    id: t,
                    active: n,
                    disabled: i
                }
            }, t.clearAll = function () {
                return {
                    type: "CLEAR_ALL"
                }
            }
        }, function (e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                    return typeof e
                } : function (e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                },
                i = (t.capitalise = function (e) {
                    return e.replace(/\w\S*/g, function (e) {
                        return e.charAt(0).toUpperCase() + e.substr(1).toLowerCase()
                    })
                }, t.generateChars = function (e) {
                    for (var t = "", n = 0; n < e; n++) {
                        t += l(0, 36).toString(36)
                    }
                    return t
                }),
                r = (t.generateId = function (e, t) {
                    var n = e.id || e.name && e.name + "-" + i(2) || i(4);
                    return n = n.replace(/(:|\.|\[|\]|,)/g, ""), n = t + n
                }, t.getType = function (e) {
                    return Object.prototype.toString.call(e).slice(8, -1)
                }),
                o = t.isType = function (e, t) {
                    var n = r(t);
                    return void 0 !== t && null !== t && n === e
                },
                a = (t.isNode = function (e) {
                    return "object" === ("undefined" == typeof Node ? "undefined" : n(Node)) ? e instanceof Node : e && "object" === (void 0 === e ? "undefined" : n(e)) && "number" == typeof e.nodeType && "string" == typeof e.nodeName
                }, t.isElement = function (e) {
                    return "object" === ("undefined" == typeof HTMLElement ? "undefined" : n(HTMLElement)) ? e instanceof HTMLElement : e && "object" === (void 0 === e ? "undefined" : n(e)) && null !== e && 1 === e.nodeType && "string" == typeof e.nodeName
                }, t.extend = function e() {
                    for (var t = {}, n = arguments.length, i = function (n) {
                            for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (o("Object", n[i]) ? t[i] = e(!0, t[i], n[i]) : t[i] = n[i])
                        }, r = 0; r < n; r++) {
                        var a = arguments[r];
                        o("Object", a) && i(a)
                    }
                    return t
                }, t.whichTransitionEvent = function () {
                    var e, t = document.createElement("fakeelement"),
                        n = {
                            transition: "transitionend",
                            OTransition: "oTransitionEnd",
                            MozTransition: "transitionend",
                            WebkitTransition: "webkitTransitionEnd"
                        };
                    for (e in n)
                        if (void 0 !== t.style[e]) return n[e]
                }, t.whichAnimationEvent = function () {
                    var e, t = document.createElement("fakeelement"),
                        n = {
                            animation: "animationend",
                            OAnimation: "oAnimationEnd",
                            MozAnimation: "animationend",
                            WebkitAnimation: "webkitAnimationEnd"
                        };
                    for (e in n)
                        if (void 0 !== t.style[e]) return n[e]
                }),
                l = (t.getParentsUntil = function (e, t, n) {
                    for (var i = []; e && e !== document; e = e.parentNode) {
                        if (t) {
                            var r = t.charAt(0);
                            if ("." === r && e.classList.contains(t.substr(1))) break;
                            if ("#" === r && e.id === t.substr(1)) break;
                            if ("[" === r && e.hasAttribute(t.substr(1, t.length - 1))) break;
                            if (e.tagName.toLowerCase() === t) break
                        }
                        if (n) {
                            var o = n.charAt(0);
                            "." === o && e.classList.contains(n.substr(1)) && i.push(e), "#" === o && e.id === n.substr(1) && i.push(e), "[" === o && e.hasAttribute(n.substr(1, n.length - 1)) && i.push(e), e.tagName.toLowerCase() === n && i.push(e)
                        } else i.push(e)
                    }
                    return 0 === i.length ? null : i
                }, t.wrap = function (e, t) {
                    return t = t || document.createElement("div"), e.nextSibling ? e.parentNode.insertBefore(t, e.nextSibling) : e.parentNode.appendChild(t), t.appendChild(e)
                }, t.getSiblings = function (e) {
                    for (var t = [], n = e.parentNode.firstChild; n; n = n.nextSibling) 1 === n.nodeType && n !== e && t.push(n);
                    return t
                }, t.findAncestor = function (e, t) {
                    for (;
                        (e = e.parentElement) && !e.classList.contains(t););
                    return e
                }, t.findAncestorByAttrName = function (e, t) {
                    for (var n = e; n;) {
                        if (n.hasAttribute(t)) return n;
                        n = n.parentElement
                    }
                    return null
                }, t.debounce = function (e, t, n) {
                    var i;
                    return function () {
                        var r = this,
                            o = arguments,
                            a = n && !i;
                        clearTimeout(i), i = setTimeout(function () {
                            i = null, n || e.apply(r, o)
                        }, t), a && e.apply(r, o)
                    }
                }, t.getElemDistance = function (e) {
                    var t = 0;
                    if (e.offsetParent)
                        do {
                            t += e.offsetTop, e = e.offsetParent
                        } while (e);
                    return t >= 0 ? t : 0
                }, t.getElementOffset = function (e, t) {
                    var n = t;
                    return n > 1 && (n = 1), n > 0 && (n = 0), Math.max(e.offsetHeight * n)
                }, t.getAdjacentEl = function (e, t) {
                    var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 1;
                    if (e && t) {
                        var i = e.parentNode.parentNode,
                            r = Array.from(i.querySelectorAll(t));
                        return r[r.indexOf(e) + (n > 0 ? 1 : -1)]
                    }
                }, t.getScrollPosition = function (e) {
                    return "bottom" === e ? Math.max((window.scrollY || window.pageYOffset) + (window.innerHeight || document.documentElement.clientHeight)) : window.scrollY || window.pageYOffset
                }, t.isInView = function (e, t, n) {
                    return this.getScrollPosition(t) > this.getElemDistance(e) + this.getElementOffset(e, n)
                }, t.isScrolledIntoView = function (e, t) {
                    var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 1;
                    if (e) {
                        return n > 0 ? t.scrollTop + t.offsetHeight >= e.offsetTop + e.offsetHeight : e.offsetTop >= t.scrollTop
                    }
                }, t.stripHTML = function (e) {
                    var t = document.createElement("DIV");
                    return t.innerHTML = e, t.textContent || t.innerText || ""
                }, t.addAnimation = function (e, t) {
                    var n = a();
                    e.classList.add(t), e.addEventListener(n, function i() {
                        e.classList.remove(t), e.removeEventListener(n, i, !1)
                    }, !1)
                }, t.getRandomNumber = function (e, t) {
                    return Math.floor(Math.random() * (t - e) + e)
                }),
                s = t.strToEl = function () {
                    var e = document.createElement("div");
                    return function (t) {
                        var n = t.trim(),
                            i = void 0;
                        for (e.innerHTML = n, i = e.children[0]; e.firstChild;) e.removeChild(e.firstChild);
                        return i
                    }
                }();
            t.getWidthOfInput = function (e) {
                var t = e.value || e.placeholder,
                    n = e.offsetWidth;
                if (t) {
                    var i = s("<span>" + t + "</span>");
                    if (i.style.position = "absolute", i.style.padding = "0", i.style.top = "-9999px", i.style.left = "-9999px", i.style.width = "auto", i.style.whiteSpace = "pre", document.body.contains(e) && window.getComputedStyle) {
                        var r = window.getComputedStyle(e);
                        r && (i.style.fontSize = r.fontSize, i.style.fontFamily = r.fontFamily, i.style.fontWeight = r.fontWeight, i.style.fontStyle = r.fontStyle, i.style.letterSpacing = r.letterSpacing, i.style.textTransform = r.textTransform, i.style.padding = r.padding)
                    }
                    document.body.appendChild(i), t && i.offsetWidth !== e.offsetWidth && (n = i.offsetWidth + 4), document.body.removeChild(i)
                }
                return n + "px"
            }, t.sortByAlpha = function (e, t) {
                var n = (e.label || e.value).toLowerCase(),
                    i = (t.label || t.value).toLowerCase();
                return n < i ? -1 : n > i ? 1 : 0
            }, t.sortByScore = function (e, t) {
                return e.score - t.score
            }, t.triggerEvent = function (e, t) {
                var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null,
                    i = new CustomEvent(t, {
                        detail: n,
                        bubbles: !0,
                        cancelable: !0
                    });
                return e.dispatchEvent(i)
            }
        }, function (e, t) {
            "use strict";
            ! function () {
                function e(e, t) {
                    t = t || {
                        bubbles: !1,
                        cancelable: !1,
                        detail: void 0
                    };
                    var n = document.createEvent("CustomEvent");
                    return n.initCustomEvent(e, t.bubbles, t.cancelable, t.detail), n
                }
                Array.from || (Array.from = function () {
                    var e = Object.prototype.toString,
                        t = function (t) {
                            return "function" == typeof t || "[object Function]" === e.call(t)
                        },
                        n = Math.pow(2, 53) - 1,
                        i = function (e) {
                            var t = function (e) {
                                var t = Number(e);
                                return isNaN(t) ? 0 : 0 !== t && isFinite(t) ? (t > 0 ? 1 : -1) * Math.floor(Math.abs(t)) : t
                            }(e);
                            return Math.min(Math.max(t, 0), n)
                        };
                    return function (e) {
                        var n = this,
                            r = Object(e);
                        if (null == e) throw new TypeError("Array.from requires an array-like object - not null or undefined");
                        var o, a = arguments.length > 1 ? arguments[1] : void 0;
                        if (void 0 !== a) {
                            if (!t(a)) throw new TypeError("Array.from: when provided, the second argument must be a function");
                            arguments.length > 2 && (o = arguments[2])
                        }
                        for (var l, s = i(r.length), c = t(n) ? Object(new n(s)) : new Array(s), u = 0; u < s;) l = r[u], c[u] = a ? void 0 === o ? a(l, u) : a.call(o, l, u) : l, u += 1;
                        return c.length = s, c
                    }
                }()), Array.prototype.find || (Array.prototype.find = function (e) {
                    if (null == this) throw new TypeError("Array.prototype.find called on null or undefined");
                    if ("function" != typeof e) throw new TypeError("predicate must be a function");
                    for (var t, n = Object(this), i = n.length >>> 0, r = arguments[1], o = 0; o < i; o++)
                        if (t = n[o], e.call(r, t, o, n)) return t
                }), e.prototype = window.Event.prototype, window.CustomEvent = e
            }()
        }])
    })
}, function (e, t, n) {
    ! function (t, n) {
        e.exports = n()
    }(0, function () {
        return function (e) {
            function t(i) {
                if (n[i]) return n[i].exports;
                var r = n[i] = {
                    exports: {},
                    id: i,
                    loaded: !1
                };
                return e[i].call(r.exports, r, r.exports, t), r.loaded = !0, r.exports
            }
            var n = {};
            return t.m = e, t.c = n, t.p = "", t(0)
        }([function (e, t, n) {
            (function (t) {
                "use strict";
                var i = function (e, t) {
                    var n = this;
                    if (n.element = "string" == typeof e ? document.querySelector(e) : void 0 !== e.length && e.length > 0 ? e[0] : e, !n.element) throw new Error("[cleave.js] Please check the element");
                    t.initValue = n.element.value, n.properties = i.DefaultProperties.assign({}, t), n.init()
                };
                i.prototype = {
                    init: function () {
                        var e = this,
                            t = e.properties;
                        t.numeral || t.phone || t.creditCard || t.date || 0 !== t.blocksLength || t.prefix ? (t.maxLength = i.Util.getMaxLength(t.blocks), e.isAndroid = i.Util.isAndroid(), e.lastInputValue = "", e.onChangeListener = e.onChange.bind(e), e.onKeyDownListener = e.onKeyDown.bind(e), e.onCutListener = e.onCut.bind(e), e.onCopyListener = e.onCopy.bind(e), e.element.addEventListener("input", e.onChangeListener), e.element.addEventListener("keydown", e.onKeyDownListener), e.element.addEventListener("cut", e.onCutListener), e.element.addEventListener("copy", e.onCopyListener), e.initPhoneFormatter(), e.initDateFormatter(), e.initNumeralFormatter(), e.onInput(t.initValue)) : e.onInput(t.initValue)
                    },
                    initNumeralFormatter: function () {
                        var e = this.properties;
                        e.numeral && (e.numeralFormatter = new i.NumeralFormatter(e.numeralDecimalMark, e.numeralIntegerScale, e.numeralDecimalScale, e.numeralThousandsGroupStyle, e.numeralPositiveOnly, e.stripLeadingZeroes, e.delimiter))
                    },
                    initDateFormatter: function () {
                        var e = this.properties;
                        e.date && (e.dateFormatter = new i.DateFormatter(e.datePattern), e.blocks = e.dateFormatter.getBlocks(), e.blocksLength = e.blocks.length, e.maxLength = i.Util.getMaxLength(e.blocks))
                    },
                    initPhoneFormatter: function () {
                        var e = this.properties;
                        if (e.phone) try {
                            e.phoneFormatter = new i.PhoneFormatter(new e.root.Cleave.AsYouTypeFormatter(e.phoneRegionCode), e.delimiter)
                        } catch (e) {
                            throw new Error("[cleave.js] Please include phone-type-formatter.{country}.js lib")
                        }
                    },
                    onKeyDown: function (e) {
                        var t = this.properties,
                            n = e.which || e.keyCode,
                            r = i.Util,
                            o = this.element.value;
                        r.isAndroidBackspaceKeydown(this.lastInputValue, o) && (n = 8), this.lastInputValue = o, 8 === n && r.isDelimiter(o.slice(-t.delimiterLength), t.delimiter, t.delimiters) ? t.backspace = !0 : t.backspace = !1
                    },
                    onChange: function () {
                        this.onInput(this.element.value)
                    },
                    onCut: function (e) {
                        this.copyClipboardData(e), this.onInput("")
                    },
                    onCopy: function (e) {
                        this.copyClipboardData(e)
                    },
                    copyClipboardData: function (e) {
                        var t = this.properties,
                            n = i.Util,
                            r = this.element.value,
                            o = "";
                        o = t.copyDelimiter ? r : n.stripDelimiters(r, t.delimiter, t.delimiters);
                        try {
                            e.clipboardData ? e.clipboardData.setData("Text", o) : window.clipboardData.setData("Text", o), e.preventDefault()
                        } catch (e) {}
                    },
                    onInput: function (e) {
                        var t = this,
                            n = t.properties,
                            r = i.Util;
                        return n.numeral || !n.backspace || r.isDelimiter(e.slice(-n.delimiterLength), n.delimiter, n.delimiters) || (e = r.headStr(e, e.length - n.delimiterLength)), n.phone ? (!n.prefix || n.noImmediatePrefix && !e.length ? n.result = n.phoneFormatter.format(e) : n.result = n.prefix + n.phoneFormatter.format(e).slice(n.prefix.length), void t.updateValueState()) : n.numeral ? (!n.prefix || n.noImmediatePrefix && !e.length ? n.result = n.numeralFormatter.format(e) : n.result = n.prefix + n.numeralFormatter.format(e), void t.updateValueState()) : (n.date && (e = n.dateFormatter.getValidatedDate(e)), e = r.stripDelimiters(e, n.delimiter, n.delimiters), e = r.getPrefixStrippedValue(e, n.prefix, n.prefixLength), e = n.numericOnly ? r.strip(e, /[^\d]/g) : e, e = n.uppercase ? e.toUpperCase() : e, e = n.lowercase ? e.toLowerCase() : e, !n.prefix || n.noImmediatePrefix && !e.length || (e = n.prefix + e, 0 !== n.blocksLength) ? (n.creditCard && t.updateCreditCardPropsByValue(e), e = r.headStr(e, n.maxLength), n.result = r.getFormattedValue(e, n.blocks, n.blocksLength, n.delimiter, n.delimiters), void t.updateValueState()) : (n.result = e, void t.updateValueState()))
                    },
                    updateCreditCardPropsByValue: function (e) {
                        var t, n = this,
                            r = n.properties,
                            o = i.Util;
                        o.headStr(r.result, 4) !== o.headStr(e, 4) && (t = i.CreditCardDetector.getInfo(e, r.creditCardStrictMode), r.blocks = t.blocks, r.blocksLength = r.blocks.length, r.maxLength = o.getMaxLength(r.blocks), r.creditCardType !== t.type && (r.creditCardType = t.type, r.onCreditCardTypeChanged.call(n, r.creditCardType)))
                    },
                    setCurrentSelection: function (e, t) {
                        var n = this.element;
                        if (t.length !== e && n === document.activeElement)
                            if (n.createTextRange) {
                                var i = n.createTextRange();
                                i.move("character", e), i.select()
                            } else n.setSelectionRange(e, e)
                    },
                    updateValueState: function () {
                        var e = this,
                            t = e.element.selectionEnd,
                            n = e.element.value;
                        e.isAndroid ? window.setTimeout(function () {
                            e.element.value = e.properties.result, e.setCurrentSelection(t, n)
                        }, 1) : (e.element.value = e.properties.result, e.setCurrentSelection(t, n))
                    },
                    setPhoneRegionCode: function (e) {
                        this.properties.phoneRegionCode = e, this.initPhoneFormatter(), this.onChange()
                    },
                    setRawValue: function (e) {
                        var t = this.properties;
                        e = void 0 !== e && null !== e ? e.toString() : "", t.numeral && (e = e.replace(".", t.numeralDecimalMark)), t.backspace = !1, this.element.value = e, this.onInput(e)
                    },
                    getRawValue: function () {
                        var e = this.properties,
                            t = i.Util,
                            n = this.element.value;
                        return e.rawValueTrimPrefix && (n = t.getPrefixStrippedValue(n, e.prefix, e.prefixLength)), n = e.numeral ? e.numeralFormatter.getRawValue(n) : t.stripDelimiters(n, e.delimiter, e.delimiters)
                    },
                    getISOFormatDate: function () {
                        var e = this.properties;
                        return e.date ? e.dateFormatter.getISOFormatDate() : ""
                    },
                    getFormattedValue: function () {
                        return this.element.value
                    },
                    destroy: function () {
                        this.element.removeEventListener("input", this.onChangeListener), this.element.removeEventListener("keydown", this.onKeyDownListener), this.element.removeEventListener("cut", this.onCutListener), this.element.removeEventListener("copy", this.onCopyListener)
                    },
                    toString: function () {
                        return "[Cleave Object]"
                    }
                }, i.NumeralFormatter = n(1), i.DateFormatter = n(2), i.PhoneFormatter = n(3), i.CreditCardDetector = n(4), i.Util = n(5), i.DefaultProperties = n(6), ("object" == typeof t && t ? t : window).Cleave = i, e.exports = i
            }).call(t, function () {
                return this
            }())
        }, function (e, t) {
            "use strict";
            var n = function (e, t, i, r, o, a, l) {
                this.numeralDecimalMark = e || ".", this.numeralIntegerScale = t > 0 ? t : 0, this.numeralDecimalScale = i >= 0 ? i : 2, this.numeralThousandsGroupStyle = r || n.groupStyle.thousand, this.numeralPositiveOnly = !!o, this.stripLeadingZeroes = void 0 == a || a, this.delimiter = l || "" === l ? l : ",", this.delimiterRE = l ? new RegExp("\\" + l, "g") : ""
            };
            n.groupStyle = {
                thousand: "thousand",
                lakh: "lakh",
                wan: "wan",
                none: "none"
            }, n.prototype = {
                getRawValue: function (e) {
                    return e.replace(this.delimiterRE, "").replace(this.numeralDecimalMark, ".")
                },
                format: function (e) {
                    var t, i, r = this,
                        o = "";
                    switch (e = e.replace(/[A-Za-z]/g, "").replace(r.numeralDecimalMark, "M").replace(/[^\dM-]/g, "").replace(/^\-/, "N").replace(/\-/g, "").replace("N", r.numeralPositiveOnly ? "" : "-").replace("M", r.numeralDecimalMark), r.stripLeadingZeroes && (e = e.replace(/^(-)?0+(?=\d)/, "$1")), i = e, e.indexOf(r.numeralDecimalMark) >= 0 && (i = (t = e.split(r.numeralDecimalMark))[0], o = r.numeralDecimalMark + t[1].slice(0, r.numeralDecimalScale)), r.numeralIntegerScale > 0 && (i = i.slice(0, r.numeralIntegerScale + ("-" === e.slice(0, 1) ? 1 : 0))), r.numeralThousandsGroupStyle) {
                        case n.groupStyle.lakh:
                            i = i.replace(/(\d)(?=(\d\d)+\d$)/g, "$1" + r.delimiter);
                            break;
                        case n.groupStyle.wan:
                            i = i.replace(/(\d)(?=(\d{4})+$)/g, "$1" + r.delimiter);
                            break;
                        case n.groupStyle.thousand:
                            i = i.replace(/(\d)(?=(\d{3})+$)/g, "$1" + r.delimiter)
                    }
                    return i.toString() + (r.numeralDecimalScale > 0 ? o.toString() : "")
                }
            }, e.exports = n
        }, function (e, t) {
            "use strict";
            var n = function (e) {
                this.date = [], this.blocks = [], this.datePattern = e, this.initBlocks()
            };
            n.prototype = {
                initBlocks: function () {
                    var e = this;
                    e.datePattern.forEach(function (t) {
                        "Y" === t ? e.blocks.push(4) : e.blocks.push(2)
                    })
                },
                getISOFormatDate: function () {
                    var e = this.date;
                    return e[2] ? e[2] + "-" + this.addLeadingZero(e[1]) + "-" + this.addLeadingZero(e[0]) : ""
                },
                getBlocks: function () {
                    return this.blocks
                },
                getValidatedDate: function (e) {
                    var t = this,
                        n = "";
                    return e = e.replace(/[^\d]/g, ""), t.blocks.forEach(function (i, r) {
                        if (e.length > 0) {
                            var o = e.slice(0, i),
                                a = o.slice(0, 1),
                                l = e.slice(i);
                            switch (t.datePattern[r]) {
                                case "d":
                                    "00" === o ? o = "01" : parseInt(a, 10) > 3 ? o = "0" + a : parseInt(o, 10) > 31 && (o = "31");
                                    break;
                                case "m":
                                    "00" === o ? o = "01" : parseInt(a, 10) > 1 ? o = "0" + a : parseInt(o, 10) > 12 && (o = "12")
                            }
                            n += o, e = l
                        }
                    }), this.getFixedDateString(n)
                },
                getFixedDateString: function (e) {
                    var t, n, i, r = this,
                        o = r.datePattern,
                        a = [],
                        l = 0,
                        s = 0,
                        c = 0,
                        u = 0,
                        h = 0,
                        d = 0;
                    return 4 === e.length && "y" !== o[0].toLowerCase() && "y" !== o[1].toLowerCase() && (h = 2 - (u = "d" === o[0] ? 0 : 2), t = parseInt(e.slice(u, u + 2), 10), n = parseInt(e.slice(h, h + 2), 10), a = this.getFixedDate(t, n, 0)), 8 === e.length && (o.forEach(function (e, t) {
                        switch (e) {
                            case "d":
                                l = t;
                                break;
                            case "m":
                                s = t;
                                break;
                            default:
                                c = t
                        }
                    }), d = 2 * c, u = l <= c ? 2 * l : 2 * l + 2, h = s <= c ? 2 * s : 2 * s + 2, t = parseInt(e.slice(u, u + 2), 10), n = parseInt(e.slice(h, h + 2), 10), i = parseInt(e.slice(d, d + 4), 10), a = this.getFixedDate(t, n, i)), r.date = a, 0 === a.length ? e : o.reduce(function (e, t) {
                        switch (t) {
                            case "d":
                                return e + r.addLeadingZero(a[0]);
                            case "m":
                                return e + r.addLeadingZero(a[1]);
                            default:
                                return e + "" + (a[2] || "")
                        }
                    }, "")
                },
                getFixedDate: function (e, t, n) {
                    return e = Math.min(e, 31), t = Math.min(t, 12), n = parseInt(n || 0, 10), (t < 7 && t % 2 == 0 || t > 8 && t % 2 == 1) && (e = Math.min(e, 2 === t ? this.isLeapYear(n) ? 29 : 28 : 30)), [e, t, n]
                },
                isLeapYear: function (e) {
                    return e % 4 == 0 && e % 100 != 0 || e % 400 == 0
                },
                addLeadingZero: function (e) {
                    return (e < 10 ? "0" : "") + e
                }
            }, e.exports = n
        }, function (e, t) {
            "use strict";
            var n = function (e, t) {
                this.delimiter = t || "" === t ? t : " ", this.delimiterRE = t ? new RegExp("\\" + t, "g") : "", this.formatter = e
            };
            n.prototype = {
                setFormatter: function (e) {
                    this.formatter = e
                },
                format: function (e) {
                    var t = this;
                    t.formatter.clear();
                    for (var n, i = "", r = !1, o = 0, a = (e = (e = e.replace(/[^\d+]/g, "")).replace(t.delimiterRE, "")).length; o < a; o++) n = t.formatter.inputDigit(e.charAt(o)), /[\s()-]/g.test(n) ? (i = n, r = !0) : r || (i = n);
                    return i = i.replace(/[()]/g, ""), i = i.replace(/[\s-]/g, t.delimiter)
                }
            }, e.exports = n
        }, function (e, t) {
            "use strict";
            var n = {
                blocks: {
                    uatp: [4, 5, 6],
                    amex: [4, 6, 5],
                    diners: [4, 6, 4],
                    discover: [4, 4, 4, 4],
                    mastercard: [4, 4, 4, 4],
                    dankort: [4, 4, 4, 4],
                    instapayment: [4, 4, 4, 4],
                    jcb: [4, 4, 4, 4],
                    maestro: [4, 4, 4, 4],
                    visa: [4, 4, 4, 4],
                    mir: [4, 4, 4, 4],
                    general: [4, 4, 4, 4],
                    unionPay: [4, 4, 4, 4],
                    generalStrict: [4, 4, 4, 7]
                },
                re: {
                    uatp: /^(?!1800)1\d{0,14}/,
                    amex: /^3[47]\d{0,13}/,
                    discover: /^(?:6011|65\d{0,2}|64[4-9]\d?)\d{0,12}/,
                    diners: /^3(?:0([0-5]|9)|[689]\d?)\d{0,11}/,
                    mastercard: /^(5[1-5]\d{0,2}|22[2-9]\d{0,1}|2[3-7]\d{0,2})\d{0,12}/,
                    dankort: /^(5019|4175|4571)\d{0,12}/,
                    instapayment: /^63[7-9]\d{0,13}/,
                    jcb: /^(?:2131|1800|35\d{0,2})\d{0,12}/,
                    maestro: /^(?:5[0678]\d{0,2}|6304|67\d{0,2})\d{0,12}/,
                    mir: /^220[0-4]\d{0,12}/,
                    visa: /^4\d{0,15}/,
                    unionPay: /^62\d{0,14}/
                },
                getInfo: function (e, t) {
                    var i = n.blocks,
                        r = n.re;
                    t = !!t;
                    for (var o in r)
                        if (r[o].test(e)) {
                            var a;
                            return a = ("discover" === o || "maestro" === o || "visa" === o || "mir" === o || "unionPay" === o) && t ? i.generalStrict : i[o], {
                                type: o,
                                blocks: a
                            }
                        } return {
                        type: "unknown",
                        blocks: t ? i.generalStrict : i.general
                    }
                }
            };
            e.exports = n
        }, function (e, t) {
            "use strict";
            var n = {
                noop: function () {},
                strip: function (e, t) {
                    return e.replace(t, "")
                },
                isDelimiter: function (e, t, n) {
                    return 0 === n.length ? e === t : n.some(function (t) {
                        if (e === t) return !0
                    })
                },
                getDelimiterREByDelimiter: function (e) {
                    return new RegExp(e.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1"), "g")
                },
                stripDelimiters: function (e, t, n) {
                    var i = this;
                    if (0 === n.length) {
                        var r = t ? i.getDelimiterREByDelimiter(t) : "";
                        return e.replace(r, "")
                    }
                    return n.forEach(function (t) {
                        e = e.replace(i.getDelimiterREByDelimiter(t), "")
                    }), e
                },
                headStr: function (e, t) {
                    return e.slice(0, t)
                },
                getMaxLength: function (e) {
                    return e.reduce(function (e, t) {
                        return e + t
                    }, 0)
                },
                getPrefixStrippedValue: function (e, t, n) {
                    if (e.slice(0, n) !== t) {
                        var i = this.getFirstDiffIndex(t, e.slice(0, n));
                        e = t + e.slice(i, i + 1) + e.slice(n + 1)
                    }
                    return e.slice(n)
                },
                getFirstDiffIndex: function (e, t) {
                    for (var n = 0; e.charAt(n) === t.charAt(n);)
                        if ("" === e.charAt(n++)) return -1;
                    return n
                },
                getFormattedValue: function (e, t, n, i, r) {
                    var o, a = "",
                        l = r.length > 0;
                    return 0 === n ? e : (t.forEach(function (t, s) {
                        if (e.length > 0) {
                            var c = e.slice(0, t),
                                u = e.slice(t);
                            a += c, o = l ? r[s] || o : i, c.length === t && s < n - 1 && (a += o), e = u
                        }
                    }), a)
                },
                isAndroid: function () {
                    return navigator && /android/i.test(navigator.userAgent)
                },
                isAndroidBackspaceKeydown: function (e, t) {
                    return !!(this.isAndroid() && e && t) && t === e.slice(0, -1)
                }
            };
            e.exports = n
        }, function (e, t) {
            (function (t) {
                "use strict";
                var n = {
                    assign: function (e, n) {
                        return e = e || {}, n = n || {}, e.creditCard = !!n.creditCard, e.creditCardStrictMode = !!n.creditCardStrictMode, e.creditCardType = "", e.onCreditCardTypeChanged = n.onCreditCardTypeChanged || function () {}, e.phone = !!n.phone, e.phoneRegionCode = n.phoneRegionCode || "AU", e.phoneFormatter = {}, e.date = !!n.date, e.datePattern = n.datePattern || ["d", "m", "Y"], e.dateFormatter = {}, e.numeral = !!n.numeral, e.numeralIntegerScale = n.numeralIntegerScale > 0 ? n.numeralIntegerScale : 0, e.numeralDecimalScale = n.numeralDecimalScale >= 0 ? n.numeralDecimalScale : 2, e.numeralDecimalMark = n.numeralDecimalMark || ".", e.numeralThousandsGroupStyle = n.numeralThousandsGroupStyle || "thousand", e.numeralPositiveOnly = !!n.numeralPositiveOnly, e.stripLeadingZeroes = void 0 == n.stripLeadingZeroes || n.stripLeadingZeroes, e.numericOnly = e.creditCard || e.date || !!n.numericOnly, e.uppercase = !!n.uppercase, e.lowercase = !!n.lowercase, e.prefix = e.creditCard || e.date ? "" : n.prefix || "", e.noImmediatePrefix = !!n.noImmediatePrefix, e.prefixLength = e.prefix.length, e.rawValueTrimPrefix = !!n.rawValueTrimPrefix, e.copyDelimiter = !!n.copyDelimiter, e.initValue = void 0 !== n.initValue && null !== n.initValue ? n.initValue.toString() : "", e.delimiter = n.delimiter || "" === n.delimiter ? n.delimiter : n.date ? "/" : n.numeral ? "," : (n.phone, " "), e.delimiterLength = e.delimiter.length, e.delimiters = n.delimiters || [], e.blocks = n.blocks || [], e.blocksLength = e.blocks.length, e.root = "object" == typeof t && t ? t : window, e.maxLength = 0, e.backspace = !1, e.result = "", e
                    }
                };
                e.exports = n
            }).call(t, function () {
                return this
            }())
        }])
    })
}, function (e, t, n) {
    ! function (t, n) {
        e.exports = n()
    }(0, function () {
        "use strict";

        function e(e, t, n) {
            return !1 !== n ? new Date(e.getTime()).setHours(0, 0, 0, 0) - new Date(t.getTime()).setHours(0, 0, 0, 0) : e.getTime() - t.getTime()
        }

        function t(e, t, n) {
            void 0 === n && (n = !1);
            var i;
            return function () {
                var r = this,
                    o = arguments;
                null !== i && clearTimeout(i), i = window.setTimeout(function () {
                    i = null, n || e.apply(r, o)
                }, t), n && !i && e.apply(r, o)
            }
        }

        function n(e, t, n) {
            if (!0 === n) return e.classList.add(t);
            e.classList.remove(t)
        }

        function i(e, t, n) {
            var i = window.document.createElement(e);
            return t = t || "", n = n || "", i.className = t, void 0 !== n && (i.textContent = n), i
        }

        function r(e, t) {
            return t(e) ? e : e.parentNode ? r(e.parentNode, t) : void 0
        }

        function o(e) {
            var t = i("div", "numInputWrapper"),
                n = i("input", "numInput " + e),
                r = i("span", "arrowUp"),
                o = i("span", "arrowDown");
            return n.type = "text", n.pattern = "\\d*", t.appendChild(n), t.appendChild(r), t.appendChild(o), t
        }

        function a(a, l) {
            function h(e) {
                return e.bind(ae)
            }

            function d(e) {
                if (ae.config.noCalendar && 0 === ae.selectedDates.length) {
                    var t = ae.config.minDate;
                    ae.setDate((new Date).setHours(t ? t.getHours() : ae.config.defaultHour, t ? t.getMinutes() : ae.config.defaultMinute, t && ae.config.enableSeconds ? t.getSeconds() : ae.config.defaultSeconds), !1), m(), ie()
                }! function (e) {
                    e.preventDefault();
                    var t = "keydown" === e.type,
                        n = e.target;
                    void 0 !== ae.amPM && e.target === ae.amPM && (ae.amPM.textContent = ae.l10n.amPM[f(ae.amPM.textContent === ae.l10n.amPM[0])]);
                    var i = Number(n.min),
                        r = Number(n.max),
                        o = Number(n.step),
                        a = parseInt(n.value, 10),
                        l = e.delta || (t ? 38 === e.which ? 1 : -1 : Math.max(-1, Math.min(1, e.wheelDelta || -e.deltaY)) || 0),
                        s = a + o * l;
                    if (void 0 !== n.value && 2 === n.value.length) {
                        var c = n === ae.hourElement,
                            u = n === ae.minuteElement;
                        s < i ? (s = r + s + f(!c) + (f(c) && f(!ae.amPM)), u && O(void 0, -1, ae.hourElement)) : s > r && (s = n === ae.hourElement ? s - r - f(!ae.amPM) : i, u && O(void 0, 1, ae.hourElement)), ae.amPM && c && (1 === o ? s + a === 23 : Math.abs(s - a) > o) && (ae.amPM.textContent = ae.l10n.amPM[f(ae.amPM.textContent === ae.l10n.amPM[0])]), n.value = p(s)
                    }
                }(e), 0 !== ae.selectedDates.length && (!ae.minDateHasTime || "input" !== e.type || e.target.value.length >= 2 ? (m(), ie()) : setTimeout(function () {
                    m(), ie()
                }, 1e3))
            }

            function m() {
                if (void 0 !== ae.hourElement && void 0 !== ae.minuteElement) {
                    var t = (parseInt(ae.hourElement.value.slice(-2), 10) || 0) % 24,
                        n = (parseInt(ae.minuteElement.value, 10) || 0) % 60,
                        i = void 0 !== ae.secondElement ? (parseInt(ae.secondElement.value, 10) || 0) % 60 : 0;
                    void 0 !== ae.amPM && (t = function (e, t) {
                        return e % 12 + 12 * f(t === ae.l10n.amPM[1])
                    }(t, ae.amPM.textContent)), ae.config.minDate && ae.minDateHasTime && ae.latestSelectedDateObj && 0 === e(ae.latestSelectedDateObj, ae.config.minDate) && (t = Math.max(t, ae.config.minDate.getHours())) === ae.config.minDate.getHours() && (n = Math.max(n, ae.config.minDate.getMinutes())), ae.config.maxDate && ae.maxDateHasTime && ae.latestSelectedDateObj && 0 === e(ae.latestSelectedDateObj, ae.config.maxDate) && (t = Math.min(t, ae.config.maxDate.getHours())) === ae.config.maxDate.getHours() && (n = Math.min(n, ae.config.maxDate.getMinutes())), M(t, n, i)
                }
            }

            function w(e) {
                var t = e || ae.latestSelectedDateObj;
                t && M(t.getHours(), t.getMinutes(), t.getSeconds())
            }

            function M(e, t, n) {
                void 0 !== ae.latestSelectedDateObj && ae.latestSelectedDateObj.setHours(e % 24, t, n || 0, 0), ae.hourElement && ae.minuteElement && !ae.isMobile && (ae.hourElement.value = p(ae.config.time_24hr ? e : (12 + e) % 12 + 12 * f(e % 12 == 0)), ae.minuteElement.value = p(t), void 0 !== ae.amPM && (ae.amPM.textContent = ae.l10n.amPM[f(e >= 12)]), void 0 !== ae.secondElement && (ae.secondElement.value = p(n)))
            }

            function C(e) {
                var t = parseInt(e.target.value) + (e.delta || 0);
                4 !== t.toString().length && "Enter" !== e.key || (ae.currentYearElement.blur(), /[^\d]/.test(t.toString()) || Y(t))
            }

            function E(e, t, n) {
                return t instanceof Array ? t.forEach(function (t) {
                    return E(e, t, n)
                }) : e instanceof Array ? e.forEach(function (e) {
                    return E(e, t, n)
                }) : (e.addEventListener(t, n), void ae._handlers.push({
                    element: e,
                    event: t,
                    handler: n
                }))
            }

            function S(e) {
                return function (t) {
                    1 === t.which && e(t)
                }
            }

            function _() {
                X("onChange")
            }

            function D() {
                ae._animationLoop.forEach(function (e) {
                    return e()
                }), ae._animationLoop = []
            }

            function k(e) {
                if (ae.daysContainer && ae.daysContainer.childNodes.length > 1) switch (e.animationName) {
                    case "fpSlideLeft":
                        ae.daysContainer.lastChild && ae.daysContainer.lastChild.classList.remove("slideLeftNew"), ae.daysContainer.removeChild(ae.daysContainer.firstChild), ae.days = ae.daysContainer.firstChild, D();
                        break;
                    case "fpSlideRight":
                        ae.daysContainer.firstChild && ae.daysContainer.firstChild.classList.remove("slideRightNew"), ae.daysContainer.removeChild(ae.daysContainer.lastChild), ae.days = ae.daysContainer.firstChild, D()
                }
            }

            function I(e) {
                switch (e.animationName) {
                    case "fpSlideLeftNew":
                    case "fpSlideRightNew":
                        ae.navigationCurrentMonth.classList.remove("slideLeftNew"), ae.navigationCurrentMonth.classList.remove("slideRightNew");
                        for (var t = ae.navigationCurrentMonth; t.nextSibling && /curr/.test(t.nextSibling.className);) ae.monthNav.removeChild(t.nextSibling);
                        for (; t.previousSibling && /curr/.test(t.previousSibling.className);) ae.monthNav.removeChild(t.previousSibling);
                        ae.oldCurMonth = void 0
                }
            }

            function A(e) {
                var t = void 0 !== e ? Q(e) : ae.latestSelectedDateObj || (ae.config.minDate && ae.config.minDate > ae.now ? ae.config.minDate : ae.config.maxDate && ae.config.maxDate < ae.now ? ae.config.maxDate : ae.now);
                try {
                    void 0 !== t && (ae.currentYear = t.getFullYear(), ae.currentMonth = t.getMonth())
                } catch (e) {
                    e.message = "Invalid date supplied: " + t, ae.config.errorHandler(e)
                }
                ae.redraw()
            }

            function T(e) {
                ~e.target.className.indexOf("arrow") && O(e, e.target.classList.contains("arrowUp") ? 1 : -1)
            }

            function O(e, t, n) {
                var i = e && e.target,
                    r = n || i && i.parentNode && i.parentNode.firstChild,
                    o = ee("increment");
                o.delta = t, r && r.dispatchEvent(o)
            }

            function L(t, r, o, a) {
                var l = z(r, !0),
                    s = i("span", "flatpickr-day " + t, r.getDate().toString());
                return s.dateObj = r, s.$i = a, s.setAttribute("aria-label", ae.formatDate(r, ae.config.ariaDateFormat)), 0 === e(r, ae.now) && (ae.todayDateElem = s, s.classList.add("today")), l ? (s.tabIndex = -1, te(r) && (s.classList.add("selected"), ae.selectedDateElem = s, "range" === ae.config.mode && (n(s, "startRange", ae.selectedDates[0] && 0 === e(r, ae.selectedDates[0])), n(s, "endRange", ae.selectedDates[1] && 0 === e(r, ae.selectedDates[1]))))) : (s.classList.add("disabled"), ae.selectedDates[0] && ae.minRangeDate && r > ae.minRangeDate && r < ae.selectedDates[0] ? ae.minRangeDate = r : ae.selectedDates[0] && ae.maxRangeDate && r < ae.maxRangeDate && r > ae.selectedDates[0] && (ae.maxRangeDate = r)), "range" === ae.config.mode && (function (t) {
                    return !("range" !== ae.config.mode || ae.selectedDates.length < 2) && e(t, ae.selectedDates[0]) >= 0 && e(t, ae.selectedDates[1]) <= 0
                }(r) && !te(r) && s.classList.add("inRange"), 1 === ae.selectedDates.length && void 0 !== ae.minRangeDate && void 0 !== ae.maxRangeDate && (r < ae.minRangeDate || r > ae.maxRangeDate) && s.classList.add("notAllowed")), ae.weekNumbers && "prevMonthDay" !== t && o % 7 == 1 && ae.weekNumbers.insertAdjacentHTML("beforeend", "<span class='disabled flatpickr-day'>" + ae.config.getWeek(r) + "</span>"), X("onDayCreate", s), s
            }

            function P(e, t) {
                var n = e + t || 0,
                    i = void 0 !== e ? ae.days.childNodes[n] : ae.selectedDateElem || ae.todayDateElem || ae.days.childNodes[0],
                    r = function () {
                        (i = i || ae.days.childNodes[n]).focus(), "range" === ae.config.mode && G(i)
                    };
                if (void 0 === i && 0 !== t) return t > 0 ? (ae.changeMonth(1, !0, void 0, !0), n %= 42) : t < 0 && (ae.changeMonth(-1, !0, void 0, !0), n += 42), N(r);
                r()
            }

            function N(e) {
                !0 === ae.config.animate ? ae._animationLoop.push(e) : e()
            }

            function j(e) {
                if (void 0 !== ae.daysContainer) {
                    var t = (new Date(ae.currentYear, ae.currentMonth, 1).getDay() - ae.l10n.firstDayOfWeek + 7) % 7,
                        n = "range" === ae.config.mode,
                        r = ae.utils.getDaysInMonth((ae.currentMonth - 1 + 12) % 12),
                        o = ae.utils.getDaysInMonth(),
                        a = window.document.createDocumentFragment(),
                        l = r + 1 - t,
                        s = 0;
                    for (ae.weekNumbers && ae.weekNumbers.firstChild && (ae.weekNumbers.textContent = ""), n && (ae.minRangeDate = new Date(ae.currentYear, ae.currentMonth - 1, l), ae.maxRangeDate = new Date(ae.currentYear, ae.currentMonth + 1, (42 - t) % o)); l <= r; l++, s++) a.appendChild(L("prevMonthDay", new Date(ae.currentYear, ae.currentMonth - 1, l), l, s));
                    for (l = 1; l <= o; l++, s++) a.appendChild(L("", new Date(ae.currentYear, ae.currentMonth, l), l, s));
                    for (var c = o + 1; c <= 42 - t; c++, s++) a.appendChild(L("nextMonthDay", new Date(ae.currentYear, ae.currentMonth + 1, c % o), c, s));
                    n && 1 === ae.selectedDates.length && a.childNodes[0] ? (ae._hidePrevMonthArrow = ae._hidePrevMonthArrow || !!ae.minRangeDate && ae.minRangeDate > a.childNodes[0].dateObj, ae._hideNextMonthArrow = ae._hideNextMonthArrow || !!ae.maxRangeDate && ae.maxRangeDate < new Date(ae.currentYear, ae.currentMonth + 1, 1)) : ne();
                    var u = i("div", "dayContainer");
                    if (u.appendChild(a), ae.config.animate && void 0 !== e)
                        for (; ae.daysContainer.childNodes.length > 1;) ae.daysContainer.removeChild(ae.daysContainer.firstChild);
                    else ! function (e) {
                        for (; e.firstChild;) e.removeChild(e.firstChild)
                    }(ae.daysContainer);
                    e && e >= 0 ? ae.daysContainer.appendChild(u) : ae.daysContainer.insertBefore(u, ae.daysContainer.firstChild), ae.days = ae.daysContainer.childNodes[0]
                }
            }

            function F() {
                ae.weekdayContainer || (ae.weekdayContainer = i("div", "flatpickr-weekdays"));
                var e = ae.l10n.firstDayOfWeek,
                    t = ae.l10n.weekdays.shorthand.slice();
                return e > 0 && e < t.length && (t = t.splice(e, t.length).concat(t.splice(0, e))), ae.weekdayContainer.innerHTML = "\n    <span class=flatpickr-weekday>\n      " + t.join("</span><span class=flatpickr-weekday>") + "\n    </span>\n    ", ae.weekdayContainer
            }

            function H(e, t, n, i) {
                void 0 === t && (t = !0), void 0 === n && (n = ae.config.animate), void 0 === i && (i = !1);
                var r = t ? e : e - ae.currentMonth;
                if (!(r < 0 && ae._hidePrevMonthArrow || r > 0 && ae._hideNextMonthArrow)) {
                    if (ae.currentMonth += r, (ae.currentMonth < 0 || ae.currentMonth > 11) && (ae.currentYear += ae.currentMonth > 11 ? 1 : -1, ae.currentMonth = (ae.currentMonth + 12) % 12, X("onYearChange")), j(n ? r : void 0), !n) return X("onMonthChange"), ne();
                    var o = ae.navigationCurrentMonth;
                    if (r < 0)
                        for (; o.nextSibling && /curr/.test(o.nextSibling.className);) ae.monthNav.removeChild(o.nextSibling);
                    else if (r > 0)
                        for (; o.previousSibling && /curr/.test(o.previousSibling.className);) ae.monthNav.removeChild(o.previousSibling);
                    ae.oldCurMonth = ae.navigationCurrentMonth, ae.navigationCurrentMonth = ae.monthNav.insertBefore(ae.oldCurMonth.cloneNode(!0), r > 0 ? ae.oldCurMonth.nextSibling : ae.oldCurMonth);
                    var a = ae.daysContainer;
                    if (a.firstChild && a.lastChild && (r > 0 ? (a.firstChild.classList.add("slideLeft"), a.lastChild.classList.add("slideLeftNew"), ae.oldCurMonth.classList.add("slideLeft"), ae.navigationCurrentMonth.classList.add("slideLeftNew")) : r < 0 && (a.firstChild.classList.add("slideRightNew"), a.lastChild.classList.add("slideRight"), ae.oldCurMonth.classList.add("slideRight"), ae.navigationCurrentMonth.classList.add("slideRightNew"))), ae.currentMonthElement = ae.navigationCurrentMonth.firstChild, ae.currentYearElement = ae.navigationCurrentMonth.lastChild.childNodes[0], ne(), ae.oldCurMonth.firstChild && (ae.oldCurMonth.firstChild.textContent = c(ae.currentMonth - r, ae.config.shorthandCurrentMonth, ae.l10n)), N(function () {
                            return X("onMonthChange")
                        }), i && document.activeElement && document.activeElement.$i) {
                        var l = document.activeElement.$i;
                        N(function () {
                            P(l, 0)
                        })
                    }
                }
            }

            function V(e) {
                return !(!ae.config.appendTo || !ae.config.appendTo.contains(e)) || ae.calendarContainer.contains(e)
            }

            function R(e) {
                if (ae.isOpen && !ae.config.inline) {
                    var t = V(e.target),
                        n = e.target === ae.input || e.target === ae.altInput || ae.element.contains(e.target) || e.path && e.path.indexOf && (~e.path.indexOf(ae.input) || ~e.path.indexOf(ae.altInput));
                    ("blur" === e.type ? n && e.relatedTarget && !V(e.relatedTarget) : !n && !t) && -1 === ae.config.ignoredFocusElements.indexOf(e.target) && (ae.close(), "range" === ae.config.mode && 1 === ae.selectedDates.length && (ae.clear(!1), ae.redraw()))
                }
            }

            function Y(e) {
                if (!(!e || ae.currentYearElement.min && e < parseInt(ae.currentYearElement.min) || ae.currentYearElement.max && e > parseInt(ae.currentYearElement.max))) {
                    var t = e,
                        n = ae.currentYear !== t;
                    ae.currentYear = t || ae.currentYear, ae.config.maxDate && ae.currentYear === ae.config.maxDate.getFullYear() ? ae.currentMonth = Math.min(ae.config.maxDate.getMonth(), ae.currentMonth) : ae.config.minDate && ae.currentYear === ae.config.minDate.getFullYear() && (ae.currentMonth = Math.max(ae.config.minDate.getMonth(), ae.currentMonth)), n && (ae.redraw(), X("onYearChange"))
                }
            }

            function z(t, n) {
                void 0 === n && (n = !0);
                var i = ae.parseDate(t, void 0, n);
                if (ae.config.minDate && i && e(i, ae.config.minDate, void 0 !== n ? n : !ae.minDateHasTime) < 0 || ae.config.maxDate && i && e(i, ae.config.maxDate, void 0 !== n ? n : !ae.maxDateHasTime) > 0) return !1;
                if (!ae.config.enable.length && !ae.config.disable.length) return !0;
                if (void 0 === i) return !1;
                for (var r = ae.config.enable.length > 0, o = r ? ae.config.enable : ae.config.disable, a = 0, l = void 0; a < o.length; a++) {
                    if ("function" == typeof (l = o[a]) && l(i)) return r;
                    if (l instanceof Date && void 0 !== i && l.getTime() === i.getTime()) return r;
                    if ("string" == typeof l && void 0 !== i) {
                        var s = ae.parseDate(l, void 0, !0);
                        return s && s.getTime() === i.getTime() ? r : !r
                    }
                    if ("object" == typeof l && void 0 !== i && l.from && l.to && i.getTime() >= l.from.getTime() && i.getTime() <= l.to.getTime()) return r
                }
                return !r
            }

            function B(e) {
                var t = e.target === ae._input,
                    n = V(e.target),
                    i = ae.config.allowInput,
                    r = ae.isOpen && (!i || !t),
                    o = ae.config.inline && t && !i;
                if ("Enter" === e.key && t) {
                    if (i) return ae.setDate(ae._input.value, !0, e.target === ae.altInput ? ae.config.altFormat : ae.config.dateFormat), e.target.blur();
                    ae.open()
                } else if (n || r || o) {
                    var a = !!ae.timeContainer && ae.timeContainer.contains(e.target);
                    switch (e.key) {
                        case "Enter":
                            a ? ie() : $(e);
                            break;
                        case "Escape":
                            e.preventDefault(), ae.close();
                            break;
                        case "Backspace":
                        case "Delete":
                            t && !ae.config.allowInput && ae.clear();
                            break;
                        case "ArrowLeft":
                        case "ArrowRight":
                            if (a) ae.hourElement && ae.hourElement.focus();
                            else if (e.preventDefault(), ae.daysContainer) {
                                var l = "ArrowRight" === e.key ? 1 : -1;
                                e.ctrlKey ? H(l, !0, void 0, !0) : P(e.target.$i, l)
                            }
                            break;
                        case "ArrowUp":
                        case "ArrowDown":
                            e.preventDefault();
                            var s = "ArrowDown" === e.key ? 1 : -1;
                            ae.daysContainer && void 0 !== e.target.$i ? e.ctrlKey ? (Y(ae.currentYear - s), P(e.target.$i, 0)) : a || P(e.target.$i, 7 * s) : ae.config.enableTime && (!a && ae.hourElement && ae.hourElement.focus(), d(e), ae._debouncedChange());
                            break;
                        case "Tab":
                            e.target === ae.hourElement ? (e.preventDefault(), ae.minuteElement.select()) : e.target === ae.minuteElement && (ae.secondElement || ae.amPM) ? (e.preventDefault(), void 0 !== ae.secondElement ? ae.secondElement.focus() : void 0 !== ae.amPM && ae.amPM.focus()) : e.target === ae.secondElement && ae.amPM && (e.preventDefault(), ae.amPM.focus());
                            break;
                        case ae.l10n.amPM[0].charAt(0):
                            void 0 !== ae.amPM && e.target === ae.amPM && (ae.amPM.textContent = ae.l10n.amPM[0], m(), ie());
                            break;
                        case ae.l10n.amPM[1].charAt(0):
                            void 0 !== ae.amPM && e.target === ae.amPM && (ae.amPM.textContent = ae.l10n.amPM[1], m(), ie())
                    }
                    X("onKeyDown", e)
                }
            }

            function G(e) {
                if (1 === ae.selectedDates.length && e.classList.contains("flatpickr-day") && void 0 !== ae.minRangeDate && void 0 !== ae.maxRangeDate) {
                    for (var t = e.dateObj, n = ae.parseDate(ae.selectedDates[0], void 0, !0), i = Math.min(t.getTime(), ae.selectedDates[0].getTime()), r = Math.max(t.getTime(), ae.selectedDates[0].getTime()), o = !1, a = i; a < r; a += u.DAY)
                        if (!z(new Date(a))) {
                            o = !0;
                            break
                        } for (var l = function (a, l) {
                            var s = l.getTime(),
                                c = s < ae.minRangeDate.getTime() || s > ae.maxRangeDate.getTime(),
                                u = ae.days.childNodes[a];
                            if (c) return u.classList.add("notAllowed"), ["inRange", "startRange", "endRange"].forEach(function (e) {
                                u.classList.remove(e)
                            }), "continue";
                            if (o && !c) return "continue";
                            ["startRange", "inRange", "endRange", "notAllowed"].forEach(function (e) {
                                u.classList.remove(e)
                            });
                            var h = Math.max(ae.minRangeDate.getTime(), i),
                                d = Math.min(ae.maxRangeDate.getTime(), r);
                            e.classList.add(t < ae.selectedDates[0] ? "startRange" : "endRange"), n < t && s === n.getTime() ? u.classList.add("startRange") : n > t && s === n.getTime() && u.classList.add("endRange"), s >= h && s <= d && u.classList.add("inRange")
                        }, s = 0, c = ae.days.childNodes[s].dateObj; s < 42; s++, c = ae.days.childNodes[s] && ae.days.childNodes[s].dateObj) l(s, c)
                }
            }

            function W() {
                !ae.isOpen || ae.config.static || ae.config.inline || q()
            }

            function K(e) {
                return function (t) {
                    var n = ae.config["_" + e + "Date"] = ae.parseDate(t),
                        i = ae.config["_" + ("min" === e ? "max" : "min") + "Date"];
                    void 0 !== n && (ae["min" === e ? "minDateHasTime" : "maxDateHasTime"] = n.getHours() > 0 || n.getMinutes() > 0 || n.getSeconds() > 0), ae.selectedDates && (ae.selectedDates = ae.selectedDates.filter(function (e) {
                        return z(e)
                    }), ae.selectedDates.length || "min" !== e || w(n), ie()), ae.daysContainer && (U(), void 0 !== n ? ae.currentYearElement[e] = n.getFullYear().toString() : ae.currentYearElement.removeAttribute(e), ae.currentYearElement.disabled = !!i && void 0 !== n && i.getFullYear() === n.getFullYear())
                }
            }

            function q(e) {
                if (void 0 === e && (e = ae._positionElement), void 0 !== ae.calendarContainer) {
                    var t = ae.calendarContainer.offsetHeight,
                        i = ae.calendarContainer.offsetWidth,
                        r = ae.config.position,
                        o = e.getBoundingClientRect(),
                        a = window.innerHeight - o.bottom,
                        l = "above" === r || "below" !== r && a < t && o.top > t,
                        s = window.pageYOffset + o.top + (l ? -t - 2 : e.offsetHeight + 2);
                    if (n(ae.calendarContainer, "arrowTop", !l), n(ae.calendarContainer, "arrowBottom", l), !ae.config.inline) {
                        var c = window.pageXOffset + o.left,
                            u = window.document.body.offsetWidth - o.right,
                            h = c + i > window.document.body.offsetWidth;
                        n(ae.calendarContainer, "rightMost", h), ae.config.static || (ae.calendarContainer.style.top = s + "px", h ? (ae.calendarContainer.style.left = "auto", ae.calendarContainer.style.right = u + "px") : (ae.calendarContainer.style.left = c + "px", ae.calendarContainer.style.right = "auto"))
                    }
                }
            }

            function U() {
                ae.config.noCalendar || ae.isMobile || (F(), ne(), j())
            }

            function $(t) {
                t.preventDefault(), t.stopPropagation();
                var n = r(t.target, function (e) {
                    return e.classList && e.classList.contains("flatpickr-day") && !e.classList.contains("disabled") && !e.classList.contains("notAllowed")
                });
                if (void 0 !== n) {
                    var i = n,
                        o = ae.latestSelectedDateObj = new Date(i.dateObj.getTime()),
                        a = o.getMonth() !== ae.currentMonth && "range" !== ae.config.mode;
                    if (ae.selectedDateElem = i, "single" === ae.config.mode) ae.selectedDates = [o];
                    else if ("multiple" === ae.config.mode) {
                        var l = te(o);
                        l ? ae.selectedDates.splice(parseInt(l), 1) : ae.selectedDates.push(o)
                    } else "range" === ae.config.mode && (2 === ae.selectedDates.length && ae.clear(), ae.selectedDates.push(o), 0 !== e(o, ae.selectedDates[0], !0) && ae.selectedDates.sort(function (e, t) {
                        return e.getTime() - t.getTime()
                    }));
                    if (m(), a) {
                        var s = ae.currentYear !== o.getFullYear();
                        ae.currentYear = o.getFullYear(), ae.currentMonth = o.getMonth(), s && X("onYearChange"), X("onMonthChange")
                    }
                    if (j(), ae.config.minDate && ae.minDateHasTime && ae.config.enableTime && 0 === e(o, ae.config.minDate) && w(ae.config.minDate), ie(), ae.config.enableTime && setTimeout(function () {
                            return ae.showTimeInput = !0
                        }, 50), "range" === ae.config.mode && (1 === ae.selectedDates.length ? (G(i), ae._hidePrevMonthArrow = ae._hidePrevMonthArrow || void 0 !== ae.minRangeDate && ae.minRangeDate > ae.days.childNodes[0].dateObj, ae._hideNextMonthArrow = ae._hideNextMonthArrow || void 0 !== ae.maxRangeDate && ae.maxRangeDate < new Date(ae.currentYear, ae.currentMonth + 1, 1)) : ne()), X("onChange"), a ? N(function () {
                            return ae.selectedDateElem && ae.selectedDateElem.focus()
                        }) : P(i.$i, 0), void 0 !== ae.hourElement && setTimeout(function () {
                            return void 0 !== ae.hourElement && ae.hourElement.select()
                        }, 451), ae.config.closeOnSelect) {
                        var c = "single" === ae.config.mode && !ae.config.enableTime,
                            u = "range" === ae.config.mode && 2 === ae.selectedDates.length && !ae.config.enableTime;
                        (c || u) && ae.close()
                    }
                }
            }

            function Z(e, t) {
                var n = [];
                if (e instanceof Array) n = e.map(function (e) {
                    return ae.parseDate(e, t)
                });
                else if (e instanceof Date || "number" == typeof e) n = [ae.parseDate(e, t)];
                else if ("string" == typeof e) switch (ae.config.mode) {
                    case "single":
                        n = [ae.parseDate(e, t)];
                        break;
                    case "multiple":
                        n = e.split(ae.config.conjunction).map(function (e) {
                            return ae.parseDate(e, t)
                        });
                        break;
                    case "range":
                        n = e.split(ae.l10n.rangeSeparator).map(function (e) {
                            return ae.parseDate(e, t)
                        })
                } else ae.config.errorHandler(new Error("Invalid date supplied: " + JSON.stringify(e)));
                ae.selectedDates = n.filter(function (e) {
                    return e instanceof Date && z(e, !1)
                }), ae.selectedDates.sort(function (e, t) {
                    return e.getTime() - t.getTime()
                })
            }

            function J(e) {
                return e.map(function (e) {
                    return "string" == typeof e || "number" == typeof e || e instanceof Date ? ae.parseDate(e, void 0, !0) : e && "object" == typeof e && e.from && e.to ? {
                        from: ae.parseDate(e.from, void 0),
                        to: ae.parseDate(e.to, void 0)
                    } : e
                }).filter(function (e) {
                    return e
                })
            }

            function Q(e, t, n) {
                if (0 === e || e) {
                    var i, r = e;
                    if (e instanceof Date) i = new Date(e.getTime());
                    else if ("string" != typeof e && void 0 !== e.toFixed) i = new Date(e);
                    else if ("string" == typeof e) {
                        var o = t || (ae.config || b.defaultConfig).dateFormat,
                            a = String(e).trim();
                        if ("today" === a) i = new Date, n = !0;
                        else if (/Z$/.test(a) || /GMT$/.test(a)) i = new Date(e);
                        else if (ae.config && ae.config.parseDate) i = ae.config.parseDate(e, o);
                        else {
                            i = ae.config && ae.config.noCalendar ? new Date((new Date).setHours(0, 0, 0, 0)) : new Date((new Date).getFullYear(), 0, 1, 0, 0, 0, 0);
                            for (var l = void 0, s = [], c = 0, u = 0, h = ""; c < o.length; c++) {
                                var d = o[c],
                                    p = "\\" === d,
                                    f = "\\" === o[c - 1] || p;
                                if (v[d] && !f) {
                                    h += v[d];
                                    var y = new RegExp(h).exec(e);
                                    y && (l = !0) && s["Y" !== d ? "push" : "unshift"]({
                                        fn: g[d],
                                        val: y[++u]
                                    })
                                } else p || (h += ".");
                                s.forEach(function (e) {
                                    var t = e.fn,
                                        n = e.val;
                                    return i = t(i, n, ae.l10n) || i
                                })
                            }
                            i = l ? i : void 0
                        }
                    }
                    if (i instanceof Date) return !0 === n && i.setHours(0, 0, 0, 0), i;
                    ae.config.errorHandler(new Error("Invalid date provided: " + r))
                }
            }

            function X(e, t) {
                var n = ae.config[e];
                if (void 0 !== n && n.length > 0)
                    for (var i = 0; n[i] && i < n.length; i++) n[i](ae.selectedDates, ae.input.value, ae, t);
                "onChange" === e && (ae.input.dispatchEvent(ee("change")), ae.input.dispatchEvent(ee("input")))
            }

            function ee(e) {
                var t = document.createEvent("Event");
                return t.initEvent(e, !0, !0), t
            }

            function te(t) {
                for (var n = 0; n < ae.selectedDates.length; n++)
                    if (0 === e(ae.selectedDates[n], t)) return "" + n;
                return !1
            }

            function ne() {
                ae.config.noCalendar || ae.isMobile || !ae.monthNav || (ae.currentMonthElement.textContent = c(ae.currentMonth, ae.config.shorthandCurrentMonth, ae.l10n) + " ", ae.currentYearElement.value = ae.currentYear.toString(), ae._hidePrevMonthArrow = void 0 !== ae.config.minDate && (ae.currentYear === ae.config.minDate.getFullYear() ? ae.currentMonth <= ae.config.minDate.getMonth() : ae.currentYear < ae.config.minDate.getFullYear()), ae._hideNextMonthArrow = void 0 !== ae.config.maxDate && (ae.currentYear === ae.config.maxDate.getFullYear() ? ae.currentMonth + 1 > ae.config.maxDate.getMonth() : ae.currentYear > ae.config.maxDate.getFullYear()))
            }

            function ie(e) {
                if (void 0 === e && (e = !0), !ae.selectedDates.length) return ae.clear(e);
                void 0 !== ae.mobileInput && ae.mobileFormatStr && (ae.mobileInput.value = void 0 !== ae.latestSelectedDateObj ? ae.formatDate(ae.latestSelectedDateObj, ae.mobileFormatStr) : "");
                var t = "range" !== ae.config.mode ? ae.config.conjunction : ae.l10n.rangeSeparator;
                ae.input.value = ae.selectedDates.map(function (e) {
                    return ae.formatDate(e, ae.config.dateFormat)
                }).join(t), void 0 !== ae.altInput && (ae.altInput.value = ae.selectedDates.map(function (e) {
                    return ae.formatDate(e, ae.config.altFormat)
                }).join(t)), !1 !== e && X("onValueUpdate")
            }

            function re(e) {
                e.preventDefault();
                var t = ae.currentYearElement.parentNode && ae.currentYearElement.parentNode.contains(e.target);
                if (e.target === ae.currentMonthElement || t) {
                    var n = function (e) {
                        return (e.wheelDelta || -e.deltaY) >= 0 ? 1 : -1
                    }(e);
                    t ? (Y(ae.currentYear + n), e.target.value = ae.currentYear.toString()) : ae.changeMonth(n, !0, !1)
                }
            }

            function oe(e) {
                var t = ae.prevMonthNav.contains(e.target),
                    n = ae.nextMonthNav.contains(e.target);
                t || n ? H(t ? -1 : 1) : e.target === ae.currentYearElement ? (e.preventDefault(), ae.currentYearElement.select()) : "arrowUp" === e.target.className ? ae.changeYear(ae.currentYear + 1) : "arrowDown" === e.target.className && ae.changeYear(ae.currentYear - 1)
            }
            var ae = {};
            return ae.parseDate = Q, ae.formatDate = function (e, t) {
                    return void 0 !== ae.config && void 0 !== ae.config.formatDate ? ae.config.formatDate(e, t) : t.split("").map(function (t, n, i) {
                        return x[t] && "\\" !== i[n - 1] ? x[t](e, ae.l10n, ae.config) : "\\" !== t ? t : ""
                    }).join("")
                }, ae._animationLoop = [], ae._handlers = [], ae._bind = E, ae._setHoursFromDate = w, ae.changeMonth = H, ae.changeYear = Y, ae.clear = function (e) {
                    void 0 === e && (e = !0), ae.input.value = "", ae.altInput && (ae.altInput.value = ""), ae.mobileInput && (ae.mobileInput.value = ""), ae.selectedDates = [], ae.latestSelectedDateObj = void 0, ae.showTimeInput = !1, ae.redraw(), e && X("onChange")
                }, ae.close = function () {
                    ae.isOpen = !1, ae.isMobile || (ae.calendarContainer.classList.remove("open"), ae._input.classList.remove("active")), X("onClose")
                }, ae._createElement = i, ae.destroy = function () {
                    void 0 !== ae.config && X("onDestroy");
                    for (var e = ae._handlers.length; e--;) {
                        var t = ae._handlers[e];
                        t.element.removeEventListener(t.event, t.handler)
                    }
                    ae._handlers = [], ae.mobileInput ? (ae.mobileInput.parentNode && ae.mobileInput.parentNode.removeChild(ae.mobileInput), ae.mobileInput = void 0) : ae.calendarContainer && ae.calendarContainer.parentNode && ae.calendarContainer.parentNode.removeChild(ae.calendarContainer), ae.altInput && (ae.input.type = "text", ae.altInput.parentNode && ae.altInput.parentNode.removeChild(ae.altInput), delete ae.altInput), ae.input && (ae.input.type = ae.input._type, ae.input.classList.remove("flatpickr-input"), ae.input.removeAttribute("readonly"), ae.input.value = ""), ["_showTimeInput", "latestSelectedDateObj", "_hideNextMonthArrow", "_hidePrevMonthArrow", "__hideNextMonthArrow", "__hidePrevMonthArrow", "isMobile", "isOpen", "selectedDateElem", "minDateHasTime", "maxDateHasTime", "days", "daysContainer", "_input", "_positionElement", "innerContainer", "rContainer", "monthNav", "todayDateElem", "calendarContainer", "weekdayContainer", "prevMonthNav", "nextMonthNav", "currentMonthElement", "currentYearElement", "navigationCurrentMonth", "selectedDateElem", "config"].forEach(function (e) {
                        try {
                            delete ae[e]
                        } catch (e) {}
                    })
                }, ae.isEnabled = z, ae.jumpToDate = A, ae.open = function (e, t) {
                    if (void 0 === t && (t = ae._input), ae.isMobile) return e && (e.preventDefault(), e.target && e.target.blur()), setTimeout(function () {
                        void 0 !== ae.mobileInput && ae.mobileInput.click()
                    }, 0), void X("onOpen");
                    if (!ae._input.disabled && !ae.config.inline) {
                        var n = ae.isOpen;
                        ae.isOpen = !0, q(t), ae.calendarContainer.classList.add("open"), ae._input.classList.add("active"), !n && X("onOpen")
                    }
                }, ae.redraw = U, ae.set = function (e, t) {
                    null !== e && "object" == typeof e ? Object.assign(ae.config, e) : ae.config[e] = t, ae.redraw(), A()
                }, ae.setDate = function (e, t, n) {
                    if (void 0 === t && (t = !1), 0 !== e && !e) return ae.clear(t);
                    Z(e, n), ae.showTimeInput = ae.selectedDates.length > 0, ae.latestSelectedDateObj = ae.selectedDates[0], ae.redraw(), A(), w(), ie(t), t && X("onChange")
                }, ae.toggle = function () {
                    if (ae.isOpen) return ae.close();
                    ae.open()
                }, ae.element = ae.input = a, ae.isOpen = !1,
                function () {
                    var e = ["wrap", "weekNumbers", "allowInput", "clickOpens", "time_24hr", "enableTime", "noCalendar", "altInput", "shorthandCurrentMonth", "inline", "static", "enableSeconds", "disableMobile"],
                        t = ["onChange", "onClose", "onDayCreate", "onDestroy", "onKeyDown", "onMonthChange", "onOpen", "onParseConfig", "onReady", "onValueUpdate", "onYearChange"];
                    ae.config = s({}, b.defaultConfig);
                    var n = s({}, l, JSON.parse(JSON.stringify(a.dataset || {}))),
                        i = {};
                    for (Object.defineProperty(ae.config, "enable", {
                            get: function () {
                                return ae.config._enable || []
                            },
                            set: function (e) {
                                ae.config._enable = J(e)
                            }
                        }), Object.defineProperty(ae.config, "disable", {
                            get: function () {
                                return ae.config._disable || []
                            },
                            set: function (e) {
                                ae.config._disable = J(e)
                            }
                        }), !n.dateFormat && n.enableTime && (i.dateFormat = n.noCalendar ? "H:i" + (n.enableSeconds ? ":S" : "") : b.defaultConfig.dateFormat + " H:i" + (n.enableSeconds ? ":S" : "")), n.altInput && n.enableTime && !n.altFormat && (i.altFormat = n.noCalendar ? "h:i" + (n.enableSeconds ? ":S K" : " K") : b.defaultConfig.altFormat + " h:i" + (n.enableSeconds ? ":S" : "") + " K"), Object.defineProperty(ae.config, "minDate", {
                            get: function () {
                                return ae.config._minDate
                            },
                            set: K("min")
                        }), Object.defineProperty(ae.config, "maxDate", {
                            get: function () {
                                return ae.config._maxDate
                            },
                            set: K("max")
                        }), Object.assign(ae.config, i, n), r = 0; r < e.length; r++) ae.config[e[r]] = !0 === ae.config[e[r]] || "true" === ae.config[e[r]];
                    for (r = t.length; r--;) void 0 !== ae.config[t[r]] && (ae.config[t[r]] = y(ae.config[t[r]] || []).map(h));
                    for (var r = 0; r < ae.config.plugins.length; r++) {
                        var o = ae.config.plugins[r](ae) || {};
                        for (var c in o) ~t.indexOf(c) ? ae.config[c] = y(o[c]).map(h).concat(ae.config[c]) : void 0 === n[c] && (ae.config[c] = o[c])
                    }
                    ae.isMobile = !ae.config.disableMobile && !ae.config.inline && "single" === ae.config.mode && !ae.config.disable.length && !ae.config.enable.length && !ae.config.weekNumbers && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent), X("onParseConfig")
                }(), "object" != typeof ae.config.locale && void 0 === b.l10ns[ae.config.locale] && ae.config.errorHandler(new Error("flatpickr: invalid locale " + ae.config.locale)), ae.l10n = s({}, b.l10ns.default, "object" == typeof ae.config.locale ? ae.config.locale : "default" !== ae.config.locale ? b.l10ns[ae.config.locale] : void 0), v.K = "(" + ae.l10n.amPM[0] + "|" + ae.l10n.amPM[1] + "|" + ae.l10n.amPM[0].toLowerCase() + "|" + ae.l10n.amPM[1].toLowerCase() + ")", ae.input = ae.config.wrap ? a.querySelector("[data-input]") : a, ae.input ? (ae.input._type = ae.input.type, ae.input.type = "text", ae.input.classList.add("flatpickr-input"), ae._input = ae.input, ae.config.altInput && (ae.altInput = i(ae.input.nodeName, ae.input.className + " " + ae.config.altInputClass), ae._input = ae.altInput, ae.altInput.placeholder = ae.input.placeholder, ae.altInput.disabled = ae.input.disabled, ae.altInput.required = ae.input.required, ae.altInput.type = "text", ae.input.type = "hidden", !ae.config.static && ae.input.parentNode && ae.input.parentNode.insertBefore(ae.altInput, ae.input.nextSibling)), ae.config.allowInput || ae._input.setAttribute("readonly", "readonly"), ae._positionElement = ae.config.positionElement || ae._input) : ae.config.errorHandler(new Error("Invalid input element specified")),
                function () {
                    ae.selectedDates = [], ae.now = new Date;
                    var e = ae.config.defaultDate || ae.input.value;
                    e && Z(e, ae.config.dateFormat);
                    var t = ae.selectedDates.length ? ae.selectedDates[0] : ae.config.minDate && ae.config.minDate.getTime() > ae.now.getTime() ? ae.config.minDate : ae.config.maxDate && ae.config.maxDate.getTime() < ae.now.getTime() ? ae.config.maxDate : ae.now;
                    ae.currentYear = t.getFullYear(), ae.currentMonth = t.getMonth(), ae.selectedDates.length && (ae.latestSelectedDateObj = ae.selectedDates[0]), ae.minDateHasTime = !!ae.config.minDate && (ae.config.minDate.getHours() > 0 || ae.config.minDate.getMinutes() > 0 || ae.config.minDate.getSeconds() > 0), ae.maxDateHasTime = !!ae.config.maxDate && (ae.config.maxDate.getHours() > 0 || ae.config.maxDate.getMinutes() > 0 || ae.config.maxDate.getSeconds() > 0), Object.defineProperty(ae, "showTimeInput", {
                        get: function () {
                            return ae._showTimeInput
                        },
                        set: function (e) {
                            ae._showTimeInput = e, ae.calendarContainer && n(ae.calendarContainer, "showTimeInput", e), q()
                        }
                    })
                }(), ae.utils = {
                    getDaysInMonth: function (e, t) {
                        return void 0 === e && (e = ae.currentMonth), void 0 === t && (t = ae.currentYear), 1 === e && (t % 4 == 0 && t % 100 != 0 || t % 400 == 0) ? 29 : ae.l10n.daysInMonth[e]
                    }
                }, ae.isMobile || function () {
                    var e = window.document.createDocumentFragment();
                    if (ae.calendarContainer = i("div", "flatpickr-calendar"), ae.calendarContainer.tabIndex = -1, !ae.config.noCalendar) {
                        if (e.appendChild(function () {
                                var e = window.document.createDocumentFragment();
                                ae.monthNav = i("div", "flatpickr-month"), ae.prevMonthNav = i("span", "flatpickr-prev-month"), ae.prevMonthNav.innerHTML = ae.config.prevArrow, ae.currentMonthElement = i("span", "cur-month"), ae.currentMonthElement.title = ae.l10n.scrollTitle;
                                var t = o("cur-year");
                                return ae.currentYearElement = t.childNodes[0], ae.currentYearElement.title = ae.l10n.scrollTitle, ae.config.minDate && (ae.currentYearElement.min = ae.config.minDate.getFullYear().toString()), ae.config.maxDate && (ae.currentYearElement.max = ae.config.maxDate.getFullYear().toString(), ae.currentYearElement.disabled = !!ae.config.minDate && ae.config.minDate.getFullYear() === ae.config.maxDate.getFullYear()), ae.nextMonthNav = i("span", "flatpickr-next-month"), ae.nextMonthNav.innerHTML = ae.config.nextArrow, ae.navigationCurrentMonth = i("div", "flatpickr-current-month"), ae.navigationCurrentMonth.appendChild(ae.currentMonthElement), ae.navigationCurrentMonth.appendChild(t), e.appendChild(ae.prevMonthNav), e.appendChild(ae.navigationCurrentMonth), e.appendChild(ae.nextMonthNav), ae.monthNav.appendChild(e), Object.defineProperty(ae, "_hidePrevMonthArrow", {
                                    get: function () {
                                        return ae.__hidePrevMonthArrow
                                    },
                                    set: function (e) {
                                        ae.__hidePrevMonthArrow !== e && (ae.prevMonthNav.style.display = e ? "none" : "block"), ae.__hidePrevMonthArrow = e
                                    }
                                }), Object.defineProperty(ae, "_hideNextMonthArrow", {
                                    get: function () {
                                        return ae.__hideNextMonthArrow
                                    },
                                    set: function (e) {
                                        ae.__hideNextMonthArrow !== e && (ae.nextMonthNav.style.display = e ? "none" : "block"), ae.__hideNextMonthArrow = e
                                    }
                                }), ne(), ae.monthNav
                            }()), ae.innerContainer = i("div", "flatpickr-innerContainer"), ae.config.weekNumbers) {
                            var t = function () {
                                    ae.calendarContainer.classList.add("hasWeeks");
                                    var e = i("div", "flatpickr-weekwrapper");
                                    e.appendChild(i("span", "flatpickr-weekday", ae.l10n.weekAbbreviation));
                                    var t = i("div", "flatpickr-weeks");
                                    return e.appendChild(t), {
                                        weekWrapper: e,
                                        weekNumbers: t
                                    }
                                }(),
                                r = t.weekWrapper,
                                a = t.weekNumbers;
                            ae.innerContainer.appendChild(r), ae.weekNumbers = a, ae.weekWrapper = r
                        }
                        ae.rContainer = i("div", "flatpickr-rContainer"), ae.rContainer.appendChild(F()), ae.daysContainer || (ae.daysContainer = i("div", "flatpickr-days"), ae.daysContainer.tabIndex = -1), j(), ae.rContainer.appendChild(ae.daysContainer), ae.innerContainer.appendChild(ae.rContainer), e.appendChild(ae.innerContainer)
                    }
                    ae.config.enableTime && e.appendChild(function () {
                        ae.calendarContainer.classList.add("hasTime"), ae.config.noCalendar && ae.calendarContainer.classList.add("noCalendar"), ae.timeContainer = i("div", "flatpickr-time"), ae.timeContainer.tabIndex = -1;
                        var e = i("span", "flatpickr-time-separator", ":"),
                            t = o("flatpickr-hour");
                        ae.hourElement = t.childNodes[0];
                        var n = o("flatpickr-minute");
                        if (ae.minuteElement = n.childNodes[0], ae.hourElement.tabIndex = ae.minuteElement.tabIndex = -1, ae.hourElement.value = p(ae.latestSelectedDateObj ? ae.latestSelectedDateObj.getHours() : ae.config.time_24hr ? ae.config.defaultHour : function (e) {
                                switch (e % 24) {
                                    case 0:
                                    case 12:
                                        return 12;
                                    default:
                                        return e % 12
                                }
                            }(ae.config.defaultHour)), ae.minuteElement.value = p(ae.latestSelectedDateObj ? ae.latestSelectedDateObj.getMinutes() : ae.config.defaultMinute), ae.hourElement.step = ae.config.hourIncrement.toString(), ae.minuteElement.step = ae.config.minuteIncrement.toString(), ae.hourElement.min = ae.config.time_24hr ? "0" : "1", ae.hourElement.max = ae.config.time_24hr ? "23" : "12", ae.minuteElement.min = "0", ae.minuteElement.max = "59", ae.hourElement.title = ae.minuteElement.title = ae.l10n.scrollTitle, ae.timeContainer.appendChild(t), ae.timeContainer.appendChild(e), ae.timeContainer.appendChild(n), ae.config.time_24hr && ae.timeContainer.classList.add("time24hr"), ae.config.enableSeconds) {
                            ae.timeContainer.classList.add("hasSeconds");
                            var r = o("flatpickr-second");
                            ae.secondElement = r.childNodes[0], ae.secondElement.value = p(ae.latestSelectedDateObj ? ae.latestSelectedDateObj.getSeconds() : ae.config.defaultSeconds), ae.secondElement.step = ae.minuteElement.step, ae.secondElement.min = ae.minuteElement.min, ae.secondElement.max = ae.minuteElement.max, ae.timeContainer.appendChild(i("span", "flatpickr-time-separator", ":")), ae.timeContainer.appendChild(r)
                        }
                        return ae.config.time_24hr || (ae.amPM = i("span", "flatpickr-am-pm", ae.l10n.amPM[f((ae.latestSelectedDateObj ? ae.hourElement.value : ae.config.defaultHour) > 11)]), ae.amPM.title = ae.l10n.toggleTitle, ae.amPM.tabIndex = -1, ae.timeContainer.appendChild(ae.amPM)), ae.timeContainer
                    }()), n(ae.calendarContainer, "rangeMode", "range" === ae.config.mode), n(ae.calendarContainer, "animate", ae.config.animate), ae.calendarContainer.appendChild(e);
                    var l = void 0 !== ae.config.appendTo && ae.config.appendTo.nodeType;
                    if ((ae.config.inline || ae.config.static) && (ae.calendarContainer.classList.add(ae.config.inline ? "inline" : "static"), ae.config.inline && (!l && ae.element.parentNode ? ae.element.parentNode.insertBefore(ae.calendarContainer, ae._input.nextSibling) : void 0 !== ae.config.appendTo && ae.config.appendTo.appendChild(ae.calendarContainer)), ae.config.static)) {
                        var s = i("div", "flatpickr-wrapper");
                        ae.element.parentNode && ae.element.parentNode.insertBefore(s, ae.element), s.appendChild(ae.element), ae.altInput && s.appendChild(ae.altInput), s.appendChild(ae.calendarContainer)
                    }
                    ae.config.static || ae.config.inline || (void 0 !== ae.config.appendTo ? ae.config.appendTo : window.document.body).appendChild(ae.calendarContainer)
                }(),
                function () {
                    if (ae.config.wrap && ["open", "close", "toggle", "clear"].forEach(function (e) {
                            Array.prototype.forEach.call(ae.element.querySelectorAll("[data-" + e + "]"), function (t) {
                                return E(t, "click", ae[e])
                            })
                        }), ae.isMobile) ! function () {
                        var e = ae.config.enableTime ? ae.config.noCalendar ? "time" : "datetime-local" : "date";
                        ae.mobileInput = i("input", ae.input.className + " flatpickr-mobile"), ae.mobileInput.step = ae.input.getAttribute("step") || "any", ae.mobileInput.tabIndex = 1, ae.mobileInput.type = e, ae.mobileInput.disabled = ae.input.disabled, ae.mobileInput.placeholder = ae.input.placeholder, ae.mobileFormatStr = "datetime-local" === e ? "Y-m-d\\TH:i:S" : "date" === e ? "Y-m-d" : "H:i:S", ae.selectedDates.length && (ae.mobileInput.defaultValue = ae.mobileInput.value = ae.formatDate(ae.selectedDates[0], ae.mobileFormatStr)), ae.config.minDate && (ae.mobileInput.min = ae.formatDate(ae.config.minDate, "Y-m-d")), ae.config.maxDate && (ae.mobileInput.max = ae.formatDate(ae.config.maxDate, "Y-m-d")), ae.input.type = "hidden", void 0 !== ae.altInput && (ae.altInput.type = "hidden");
                        try {
                            ae.input.parentNode && ae.input.parentNode.insertBefore(ae.mobileInput, ae.input.nextSibling)
                        } catch (e) {}
                        E(ae.mobileInput, "change", function (e) {
                            ae.setDate(e.target.value, !1, ae.mobileFormatStr), X("onChange"), X("onClose")
                        })
                    }();
                    else {
                        var e = t(W, 50);
                        if (ae._debouncedChange = t(_, 300), "range" === ae.config.mode && ae.daysContainer && !/iPhone|iPad|iPod/i.test(navigator.userAgent) && E(ae.daysContainer, "mouseover", function (e) {
                                return G(e.target)
                            }), E(window.document.body, "keydown", B), ae.config.static || E(ae._input, "keydown", B), ae.config.inline || ae.config.static || E(window, "resize", e), void 0 !== window.ontouchstart && E(window.document.body, "touchstart", R), E(window.document.body, "mousedown", S(R)), E(ae._input, "blur", R), !0 === ae.config.clickOpens && (E(ae._input, "focus", ae.open), E(ae._input, "mousedown", S(ae.open))), void 0 !== ae.daysContainer && (ae.monthNav.addEventListener("wheel", function (e) {
                                return e.preventDefault()
                            }), E(ae.monthNav, "wheel", t(re, 10)), E(ae.monthNav, "mousedown", S(oe)), E(ae.monthNav, ["keyup", "increment"], C), E(ae.daysContainer, "mousedown", S($)), ae.config.animate && (E(ae.daysContainer, ["webkitAnimationEnd", "animationend"], k), E(ae.monthNav, ["webkitAnimationEnd", "animationend"], I))), void 0 !== ae.timeContainer && void 0 !== ae.minuteElement && void 0 !== ae.hourElement) {
                            var n = function (e) {
                                return e.target.select()
                            };
                            E(ae.timeContainer, ["wheel", "input", "increment"], d), E(ae.timeContainer, "mousedown", S(T)), E(ae.timeContainer, ["wheel", "increment"], ae._debouncedChange), E(ae.timeContainer, "input", _), E([ae.hourElement, ae.minuteElement], ["focus", "click"], n), void 0 !== ae.secondElement && E(ae.secondElement, "focus", function () {
                                return ae.secondElement && ae.secondElement.select()
                            }), void 0 !== ae.amPM && E(ae.amPM, "mousedown", S(function (e) {
                                d(e), _()
                            }))
                        }
                    }
                }(), (ae.selectedDates.length || ae.config.noCalendar) && (ae.config.enableTime && w(ae.config.noCalendar ? ae.latestSelectedDateObj || ae.config.minDate : void 0), ie(!1)), ae.showTimeInput = ae.selectedDates.length > 0 || ae.config.noCalendar, void 0 !== ae.weekWrapper && void 0 !== ae.daysContainer && (ae.calendarContainer.style.width = ae.daysContainer.offsetWidth + ae.weekWrapper.offsetWidth + "px"), ae.isMobile || q(), X("onReady"), ae
        }

        function l(e, t) {
            for (var n = Array.prototype.slice.call(e), i = [], r = 0; r < n.length; r++) {
                var o = n[r];
                try {
                    if (null !== o.getAttribute("data-fp-omit")) continue;
                    void 0 !== o._flatpickr && (o._flatpickr.destroy(), o._flatpickr = void 0), o._flatpickr = a(o, t || {}), i.push(o._flatpickr)
                } catch (e) {}
            }
            return 1 === i.length ? i[0] : i
        }
        var s = Object.assign || function (e) {
                for (var t, n = 1, i = arguments.length; n < i; n++) {
                    t = arguments[n];
                    for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
                }
                return e
            },
            c = function (e, t, n) {
                return n.months[t ? "shorthand" : "longhand"][e]
            },
            u = {
                DAY: 864e5
            },
            h = {
                _disable: [],
                _enable: [],
                allowInput: !1,
                altFormat: "F j, Y",
                altInput: !1,
                altInputClass: "form-control input",
                animate: "object" == typeof window && -1 === window.navigator.userAgent.indexOf("MSIE"),
                ariaDateFormat: "F j, Y",
                clickOpens: !0,
                closeOnSelect: !0,
                conjunction: ", ",
                dateFormat: "Y-m-d",
                defaultHour: 12,
                defaultMinute: 0,
                defaultSeconds: 0,
                disable: [],
                disableMobile: !1,
                enable: [],
                enableSeconds: !1,
                enableTime: !1,
                errorHandler: console.warn,
                getWeek: function (e) {
                    var t = new Date(e.getFullYear(), 0, 1);
                    return Math.ceil(((e.getTime() - t.getTime()) / 864e5 + t.getDay() + 1) / 7)
                },
                hourIncrement: 1,
                ignoredFocusElements: [],
                inline: !1,
                locale: "default",
                minuteIncrement: 5,
                mode: "single",
                nextArrow: "<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z' /></svg>",
                noCalendar: !1,
                onChange: [],
                onClose: [],
                onDayCreate: [],
                onDestroy: [],
                onKeyDown: [],
                onMonthChange: [],
                onOpen: [],
                onParseConfig: [],
                onReady: [],
                onValueUpdate: [],
                onYearChange: [],
                plugins: [],
                position: "auto",
                positionElement: void 0,
                prevArrow: "<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z' /></svg>",
                shorthandCurrentMonth: !1,
                static: !1,
                time_24hr: !1,
                weekNumbers: !1,
                wrap: !1
            },
            d = {
                weekdays: {
                    shorthand: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                    longhand: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
                },
                months: {
                    shorthand: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    longhand: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
                },
                daysInMonth: [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
                firstDayOfWeek: 0,
                ordinal: function (e) {
                    var t = e % 100;
                    if (t > 3 && t < 21) return "th";
                    switch (t % 10) {
                        case 1:
                            return "st";
                        case 2:
                            return "nd";
                        case 3:
                            return "rd";
                        default:
                            return "th"
                    }
                },
                rangeSeparator: " to ",
                weekAbbreviation: "Wk",
                scrollTitle: "Scroll to increment",
                toggleTitle: "Click to toggle",
                amPM: ["AM", "PM"]
            },
            p = function (e) {
                return ("0" + e).slice(-2)
            },
            f = function (e) {
                return !0 === e ? 1 : 0
            },
            y = function (e) {
                return e instanceof Array ? e : [e]
            },
            m = function () {},
            g = {
                D: m,
                F: function (e, t, n) {
                    e.setMonth(n.months.longhand.indexOf(t))
                },
                G: function (e, t) {
                    e.setHours(parseFloat(t))
                },
                H: function (e, t) {
                    e.setHours(parseFloat(t))
                },
                J: function (e, t) {
                    e.setDate(parseFloat(t))
                },
                K: function (e, t, n) {
                    e.setHours(e.getHours() % 12 + 12 * f(new RegExp(n.amPM[1], "i").test(t)))
                },
                M: function (e, t, n) {
                    e.setMonth(n.months.shorthand.indexOf(t))
                },
                S: function (e, t) {
                    e.setSeconds(parseFloat(t))
                },
                U: function (e, t) {
                    return new Date(1e3 * parseFloat(t))
                },
                W: function (e, t) {
                    var n = parseInt(t);
                    return new Date(e.getFullYear(), 0, 2 + 7 * (n - 1), 0, 0, 0, 0)
                },
                Y: function (e, t) {
                    e.setFullYear(parseFloat(t))
                },
                Z: function (e, t) {
                    return new Date(t)
                },
                d: function (e, t) {
                    e.setDate(parseFloat(t))
                },
                h: function (e, t) {
                    e.setHours(parseFloat(t))
                },
                i: function (e, t) {
                    e.setMinutes(parseFloat(t))
                },
                j: function (e, t) {
                    e.setDate(parseFloat(t))
                },
                l: m,
                m: function (e, t) {
                    e.setMonth(parseFloat(t) - 1)
                },
                n: function (e, t) {
                    e.setMonth(parseFloat(t) - 1)
                },
                s: function (e, t) {
                    e.setSeconds(parseFloat(t))
                },
                w: m,
                y: function (e, t) {
                    e.setFullYear(2e3 + parseFloat(t))
                }
            },
            v = {
                D: "(\\w+)",
                F: "(\\w+)",
                G: "(\\d\\d|\\d)",
                H: "(\\d\\d|\\d)",
                J: "(\\d\\d|\\d)\\w+",
                K: "",
                M: "(\\w+)",
                S: "(\\d\\d|\\d)",
                U: "(.+)",
                W: "(\\d\\d|\\d)",
                Y: "(\\d{4})",
                Z: "(.+)",
                d: "(\\d\\d|\\d)",
                h: "(\\d\\d|\\d)",
                i: "(\\d\\d|\\d)",
                j: "(\\d\\d|\\d)",
                l: "(\\w+)",
                m: "(\\d\\d|\\d)",
                n: "(\\d\\d|\\d)",
                s: "(\\d\\d|\\d)",
                w: "(\\d\\d|\\d)",
                y: "(\\d{2})"
            },
            x = {
                Z: function (e) {
                    return e.toISOString()
                },
                D: function (e, t, n) {
                    return t.weekdays.shorthand[x.w(e, t, n)]
                },
                F: function (e, t, n) {
                    return c(x.n(e, t, n) - 1, !1, t)
                },
                G: function (e, t, n) {
                    return p(x.h(e, t, n))
                },
                H: function (e) {
                    return p(e.getHours())
                },
                J: function (e, t) {
                    return void 0 !== t.ordinal ? e.getDate() + t.ordinal(e.getDate()) : e.getDate()
                },
                K: function (e, t) {
                    return t.amPM[f(e.getHours() > 11)]
                },
                M: function (e, t) {
                    return c(e.getMonth(), !0, t)
                },
                S: function (e) {
                    return p(e.getSeconds())
                },
                U: function (e) {
                    return e.getTime() / 1e3
                },
                W: function (e, t, n) {
                    return n.getWeek(e)
                },
                Y: function (e) {
                    return e.getFullYear()
                },
                d: function (e) {
                    return p(e.getDate())
                },
                h: function (e) {
                    return e.getHours() % 12 ? e.getHours() % 12 : 12
                },
                i: function (e) {
                    return p(e.getMinutes())
                },
                j: function (e) {
                    return e.getDate()
                },
                l: function (e, t) {
                    return t.weekdays.longhand[e.getDay()]
                },
                m: function (e) {
                    return p(e.getMonth() + 1)
                },
                n: function (e) {
                    return e.getMonth() + 1
                },
                s: function (e) {
                    return e.getSeconds()
                },
                w: function (e) {
                    return e.getDay()
                },
                y: function (e) {
                    return String(e.getFullYear()).substring(2)
                }
            };
        "function" != typeof Object.assign && (Object.assign = function (e) {
            for (var t = [], n = 1; n < arguments.length; n++) t[n - 1] = arguments[n];
            if (!e) throw TypeError("Cannot convert undefined or null to object");
            for (var i = function (t) {
                    t && Object.keys(t).forEach(function (n) {
                        return e[n] = t[n]
                    })
                }, r = 0, o = t; r < o.length; r++) {
                i(o[r])
            }
            return e
        }), "undefined" != typeof HTMLElement && (HTMLCollection.prototype.flatpickr = NodeList.prototype.flatpickr = function (e) {
            return l(this, e)
        }, HTMLElement.prototype.flatpickr = function (e) {
            return l([this], e)
        });
        var b;
        b = function (e, t) {
            return e instanceof NodeList ? l(e, t) : "string" == typeof e ? l(window.document.querySelectorAll(e), t) : l([e], t)
        }, "object" == typeof window && (window.flatpickr = b), b.defaultConfig = h, b.l10ns = {
            en: s({}, d),
            default: s({}, d)
        }, b.localize = function (e) {
            b.l10ns.default = s({}, b.l10ns.default, e)
        }, b.setDefaults = function (e) {
            b.defaultConfig = s({}, b.defaultConfig, e)
        }, "undefined" != typeof jQuery && (jQuery.fn.flatpickr = function (e) {
            return l(this, e)
        }), Date.prototype.fp_incr = function (e) {
            return new Date(this.getFullYear(), this.getMonth(), this.getDate() + ("string" == typeof e ? parseInt(e, 10) : e))
        };
        return b
    })
}, function (e, t, n) {
    ! function (t, n) {
        e.exports = n()
    }(0, function () {
        return function (e) {
            function t(i) {
                if (n[i]) return n[i].exports;
                var r = n[i] = {
                    i: i,
                    l: !1,
                    exports: {}
                };
                return e[i].call(r.exports, r, r.exports, t), r.l = !0, r.exports
            }
            var n = {};
            return t.m = e, t.c = n, t.d = function (e, n, i) {
                t.o(e, n) || Object.defineProperty(e, n, {
                    configurable: !1,
                    enumerable: !0,
                    get: i
                })
            }, t.n = function (e) {
                var n = e && e.__esModule ? function () {
                    return e.default
                } : function () {
                    return e
                };
                return t.d(n, "a", n), n
            }, t.o = function (e, t) {
                return Object.prototype.hasOwnProperty.call(e, t)
            }, t.p = "", t(t.s = 49)
        }([function (e, t, n) {
            var i = n(36)("wks"),
                r = n(15),
                o = n(1).Symbol,
                a = "function" == typeof o;
            (e.exports = function (e) {
                return i[e] || (i[e] = a && o[e] || (a ? o : r)("Symbol." + e))
            }).store = i
        }, function (e, t) {
            var n = e.exports = "undefined" != typeof window && window.Math == Math ? window : "undefined" != typeof self && self.Math == Math ? self : Function("return this")();
            "number" == typeof __g && (__g = n)
        }, function (e, t) {
            e.exports = function (e) {
                return "object" == typeof e ? null !== e : "function" == typeof e
            }
        }, function (e, t, n) {
            var i = n(1),
                r = n(7),
                o = n(8),
                a = n(10),
                l = n(11),
                s = function (e, t, n) {
                    var c, u, h, d, p = e & s.F,
                        f = e & s.G,
                        y = e & s.S,
                        m = e & s.P,
                        g = e & s.B,
                        v = f ? i : y ? i[t] || (i[t] = {}) : (i[t] || {}).prototype,
                        x = f ? r : r[t] || (r[t] = {}),
                        b = x.prototype || (x.prototype = {});
                    f && (n = t);
                    for (c in n) h = ((u = !p && v && void 0 !== v[c]) ? v : n)[c], d = g && u ? l(h, i) : m && "function" == typeof h ? l(Function.call, h) : h, v && a(v, c, h, e & s.U), x[c] != h && o(x, c, d), m && b[c] != h && (b[c] = h)
                };
            i.core = r, s.F = 1, s.G = 2, s.S = 4, s.P = 8, s.B = 16, s.W = 32, s.U = 64, s.R = 128, e.exports = s
        }, function (e, t, n) {
            var i = n(9),
                r = n(29),
                o = n(31),
                a = Object.defineProperty;
            t.f = n(5) ? Object.defineProperty : function (e, t, n) {
                if (i(e), t = o(t, !0), i(n), r) try {
                    return a(e, t, n)
                } catch (e) {}
                if ("get" in n || "set" in n) throw TypeError("Accessors not supported!");
                return "value" in n && (e[t] = n.value), e
            }
        }, function (e, t, n) {
            e.exports = !n(12)(function () {
                return 7 != Object.defineProperty({}, "a", {
                    get: function () {
                        return 7
                    }
                }).a
            })
        }, function (e, t) {
            var n = {}.hasOwnProperty;
            e.exports = function (e, t) {
                return n.call(e, t)
            }
        }, function (e, t) {
            var n = e.exports = {
                version: "2.5.1"
            };
            "number" == typeof __e && (__e = n)
        }, function (e, t, n) {
            var i = n(4),
                r = n(14);
            e.exports = n(5) ? function (e, t, n) {
                return i.f(e, t, r(1, n))
            } : function (e, t, n) {
                return e[t] = n, e
            }
        }, function (e, t, n) {
            var i = n(2);
            e.exports = function (e) {
                if (!i(e)) throw TypeError(e + " is not an object!");
                return e
            }
        }, function (e, t, n) {
            var i = n(1),
                r = n(8),
                o = n(6),
                a = n(15)("src"),
                l = Function.toString,
                s = ("" + l).split("toString");
            n(7).inspectSource = function (e) {
                return l.call(e)
            }, (e.exports = function (e, t, n, l) {
                var c = "function" == typeof n;
                c && (o(n, "name") || r(n, "name", t)), e[t] !== n && (c && (o(n, a) || r(n, a, e[t] ? "" + e[t] : s.join(String(t)))), e === i ? e[t] = n : l ? e[t] ? e[t] = n : r(e, t, n) : (delete e[t], r(e, t, n)))
            })(Function.prototype, "toString", function () {
                return "function" == typeof this && this[a] || l.call(this)
            })
        }, function (e, t, n) {
            var i = n(32);
            e.exports = function (e, t, n) {
                if (i(e), void 0 === t) return e;
                switch (n) {
                    case 1:
                        return function (n) {
                            return e.call(t, n)
                        };
                    case 2:
                        return function (n, i) {
                            return e.call(t, n, i)
                        };
                    case 3:
                        return function (n, i, r) {
                            return e.call(t, n, i, r)
                        }
                }
                return function () {
                    return e.apply(t, arguments)
                }
            }
        }, function (e, t) {
            e.exports = function (e) {
                try {
                    return !!e()
                } catch (e) {
                    return !0
                }
            }
        }, function (e, t) {
            e.exports = {}
        }, function (e, t) {
            e.exports = function (e, t) {
                return {
                    enumerable: !(1 & e),
                    configurable: !(2 & e),
                    writable: !(4 & e),
                    value: t
                }
            }
        }, function (e, t) {
            var n = 0,
                i = Math.random();
            e.exports = function (e) {
                return "Symbol(".concat(void 0 === e ? "" : e, ")_", (++n + i).toString(36))
            }
        }, function (e, t, n) {
            var i = n(34),
                r = n(19);
            e.exports = function (e) {
                return i(r(e))
            }
        }, function (e, t, n) {
            var i = n(11),
                r = n(38),
                o = n(39),
                a = n(9),
                l = n(22),
                s = n(40),
                c = {},
                u = {};
            (t = e.exports = function (e, t, n, h, d) {
                var p, f, y, m, g = d ? function () {
                        return e
                    } : s(e),
                    v = i(n, h, t ? 2 : 1),
                    x = 0;
                if ("function" != typeof g) throw TypeError(e + " is not iterable!");
                if (o(g)) {
                    for (p = l(e.length); p > x; x++)
                        if ((m = t ? v(a(f = e[x])[0], f[1]) : v(e[x])) === c || m === u) return m
                } else
                    for (y = g.call(e); !(f = y.next()).done;)
                        if ((m = r(y, v, f.value, t)) === c || m === u) return m
            }).BREAK = c, t.RETURN = u
        }, function (e, t) {
            var n = Math.ceil,
                i = Math.floor;
            e.exports = function (e) {
                return isNaN(e = +e) ? 0 : (e > 0 ? i : n)(e)
            }
        }, function (e, t) {
            e.exports = function (e) {
                if (void 0 == e) throw TypeError("Can't call method on  " + e);
                return e
            }
        }, function (e, t, n) {
            "use strict";
            var i = n(52),
                r = n(3),
                o = n(10),
                a = n(8),
                l = n(6),
                s = n(13),
                c = n(53),
                u = n(24),
                h = n(59),
                d = n(0)("iterator"),
                p = !([].keys && "next" in [].keys()),
                f = function () {
                    return this
                };
            e.exports = function (e, t, n, y, m, g, v) {
                c(n, t, y);
                var x, b, w, M = function (e) {
                        if (!p && e in _) return _[e];
                        switch (e) {
                            case "keys":
                            case "values":
                                return function () {
                                    return new n(this, e)
                                }
                        }
                        return function () {
                            return new n(this, e)
                        }
                    },
                    C = t + " Iterator",
                    E = "values" == m,
                    S = !1,
                    _ = e.prototype,
                    D = _[d] || _["@@iterator"] || m && _[m],
                    k = D || M(m),
                    I = m ? E ? M("entries") : k : void 0,
                    A = "Array" == t ? _.entries || D : D;
                if (A && (w = h(A.call(new e))) !== Object.prototype && w.next && (u(w, C, !0), i || l(w, d) || a(w, d, f)), E && D && "values" !== D.name && (S = !0, k = function () {
                        return D.call(this)
                    }), i && !v || !p && !S && _[d] || a(_, d, k), s[t] = k, s[C] = f, m)
                    if (x = {
                            values: E ? k : M("values"),
                            keys: g ? k : M("keys"),
                            entries: I
                        }, v)
                        for (b in x) b in _ || o(_, b, x[b]);
                    else r(r.P + r.F * (p || S), t, x);
                return x
            }
        }, function (e, t, n) {
            var i = n(55),
                r = n(37);
            e.exports = Object.keys || function (e) {
                return i(e, r)
            }
        }, function (e, t, n) {
            var i = n(18),
                r = Math.min;
            e.exports = function (e) {
                return e > 0 ? r(i(e), 9007199254740991) : 0
            }
        }, function (e, t, n) {
            var i = n(36)("keys"),
                r = n(15);
            e.exports = function (e) {
                return i[e] || (i[e] = r(e))
            }
        }, function (e, t, n) {
            var i = n(4).f,
                r = n(6),
                o = n(0)("toStringTag");
            e.exports = function (e, t, n) {
                e && !r(e = n ? e : e.prototype, o) && i(e, o, {
                    configurable: !0,
                    value: t
                })
            }
        }, function (e, t, n) {
            var i = n(19);
            e.exports = function (e) {
                return Object(i(e))
            }
        }, function (e, t, n) {
            var i = n(35),
                r = n(0)("toStringTag"),
                o = "Arguments" == i(function () {
                    return arguments
                }());
            e.exports = function (e) {
                var t, n, a;
                return void 0 === e ? "Undefined" : null === e ? "Null" : "string" == typeof (n = function (e, t) {
                    try {
                        return e[t]
                    } catch (e) {}
                }(t = Object(e), r)) ? n : o ? i(t) : "Object" == (a = i(t)) && "function" == typeof t.callee ? "Arguments" : a
            }
        }, function (e, t, n) {
            "use strict";

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var r = i(n(86)),
                o = i(n(88)),
                a = i(n(89));
            t.default = Object.keys(o.default).map(function (e) {
                return new r.default(e, o.default[e], a.default[e])
            }).reduce(function (e, t) {
                return e[t.name] = t, e
            }, {})
        }, function (e, t, n) {
            "use strict";
            var i = n(51)(!0);
            n(20)(String, "String", function (e) {
                this._t = String(e), this._i = 0
            }, function () {
                var e, t = this._t,
                    n = this._i;
                return n >= t.length ? {
                    value: void 0,
                    done: !0
                } : (e = i(t, n), this._i += e.length, {
                    value: e,
                    done: !1
                })
            })
        }, function (e, t, n) {
            e.exports = !n(5) && !n(12)(function () {
                return 7 != Object.defineProperty(n(30)("div"), "a", {
                    get: function () {
                        return 7
                    }
                }).a
            })
        }, function (e, t, n) {
            var i = n(2),
                r = n(1).document,
                o = i(r) && i(r.createElement);
            e.exports = function (e) {
                return o ? r.createElement(e) : {}
            }
        }, function (e, t, n) {
            var i = n(2);
            e.exports = function (e, t) {
                if (!i(e)) return e;
                var n, r;
                if (t && "function" == typeof (n = e.toString) && !i(r = n.call(e))) return r;
                if ("function" == typeof (n = e.valueOf) && !i(r = n.call(e))) return r;
                if (!t && "function" == typeof (n = e.toString) && !i(r = n.call(e))) return r;
                throw TypeError("Can't convert object to primitive value")
            }
        }, function (e, t) {
            e.exports = function (e) {
                if ("function" != typeof e) throw TypeError(e + " is not a function!");
                return e
            }
        }, function (e, t, n) {
            var i = n(9),
                r = n(54),
                o = n(37),
                a = n(23)("IE_PROTO"),
                l = function () {},
                s = function () {
                    var e, t = n(30)("iframe"),
                        i = o.length;
                    for (t.style.display = "none", n(58).appendChild(t), t.src = "javascript:", (e = t.contentWindow.document).open(), e.write("<script>document.F=Object<\/script>"), e.close(), s = e.F; i--;) delete s.prototype[o[i]];
                    return s()
                };
            e.exports = Object.create || function (e, t) {
                var n;
                return null !== e ? (l.prototype = i(e), n = new l, l.prototype = null, n[a] = e) : n = s(), void 0 === t ? n : r(n, t)
            }
        }, function (e, t, n) {
            var i = n(35);
            e.exports = Object("z").propertyIsEnumerable(0) ? Object : function (e) {
                return "String" == i(e) ? e.split("") : Object(e)
            }
        }, function (e, t) {
            var n = {}.toString;
            e.exports = function (e) {
                return n.call(e).slice(8, -1)
            }
        }, function (e, t, n) {
            var i = n(1),
                r = "__core-js_shared__",
                o = i[r] || (i[r] = {});
            e.exports = function (e) {
                return o[e] || (o[e] = {})
            }
        }, function (e, t) {
            e.exports = "constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")
        }, function (e, t, n) {
            var i = n(9);
            e.exports = function (e, t, n, r) {
                try {
                    return r ? t(i(n)[0], n[1]) : t(n)
                } catch (t) {
                    var o = e.return;
                    throw void 0 !== o && i(o.call(e)), t
                }
            }
        }, function (e, t, n) {
            var i = n(13),
                r = n(0)("iterator"),
                o = Array.prototype;
            e.exports = function (e) {
                return void 0 !== e && (i.Array === e || o[r] === e)
            }
        }, function (e, t, n) {
            var i = n(26),
                r = n(0)("iterator"),
                o = n(13);
            e.exports = n(7).getIteratorMethod = function (e) {
                if (void 0 != e) return e[r] || e["@@iterator"] || o[i(e)]
            }
        }, function (e, t, n) {
            var i = n(0)("iterator"),
                r = !1;
            try {
                var o = [7][i]();
                o.return = function () {
                    r = !0
                }, Array.from(o, function () {
                    throw 2
                })
            } catch (e) {}
            e.exports = function (e, t) {
                if (!t && !r) return !1;
                var n = !1;
                try {
                    var o = [7],
                        a = o[i]();
                    a.next = function () {
                        return {
                            done: n = !0
                        }
                    }, o[i] = function () {
                        return a
                    }, e(o)
                } catch (e) {}
                return n
            }
        }, function (e, t) {
            t.f = {}.propertyIsEnumerable
        }, function (e, t) {
            e.exports = function (e, t) {
                return {
                    value: t,
                    done: !!e
                }
            }
        }, function (e, t, n) {
            var i = n(10);
            e.exports = function (e, t, n) {
                for (var r in t) i(e, r, t[r], n);
                return e
            }
        }, function (e, t) {
            e.exports = function (e, t, n, i) {
                if (!(e instanceof t) || void 0 !== i && i in e) throw TypeError(n + ": incorrect invocation!");
                return e
            }
        }, function (e, t, n) {
            var i = n(15)("meta"),
                r = n(2),
                o = n(6),
                a = n(4).f,
                l = 0,
                s = Object.isExtensible || function () {
                    return !0
                },
                c = !n(12)(function () {
                    return s(Object.preventExtensions({}))
                }),
                u = function (e) {
                    a(e, i, {
                        value: {
                            i: "O" + ++l,
                            w: {}
                        }
                    })
                },
                h = e.exports = {
                    KEY: i,
                    NEED: !1,
                    fastKey: function (e, t) {
                        if (!r(e)) return "symbol" == typeof e ? e : ("string" == typeof e ? "S" : "P") + e;
                        if (!o(e, i)) {
                            if (!s(e)) return "F";
                            if (!t) return "E";
                            u(e)
                        }
                        return e[i].i
                    },
                    getWeak: function (e, t) {
                        if (!o(e, i)) {
                            if (!s(e)) return !0;
                            if (!t) return !1;
                            u(e)
                        }
                        return e[i].w
                    },
                    onFreeze: function (e) {
                        return c && h.NEED && s(e) && !o(e, i) && u(e), e
                    }
                }
        }, function (e, t, n) {
            var i = n(2);
            e.exports = function (e, t) {
                if (!i(e) || e._t !== t) throw TypeError("Incompatible receiver, " + t + " required!");
                return e
            }
        }, function (e, t, n) {
            var i, r;
            ! function () {
                "use strict";
                var n = function () {
                    function e() {}

                    function t(e, r) {
                        for (var o = r.length, a = 0; a < o; ++a) ! function (e, r) {
                            if (!r) return;
                            var o = typeof r;
                            "string" === o ? function (e, t) {
                                for (var n = t.split(i), r = n.length, o = 0; o < r; ++o) e[n[o]] = !0
                            }(e, r) : Array.isArray(r) ? t(e, r) : "object" === o ? function (e, t) {
                                for (var i in t) n.call(t, i) && (e[i] = !!t[i])
                            }(e, r) : "number" === o && function (e, t) {
                                e[t] = !0
                            }(e, r)
                        }(e, r[a])
                    }
                    e.prototype = Object.create(null);
                    var n = {}.hasOwnProperty,
                        i = /\s+/;
                    return function () {
                        for (var n = arguments.length, i = Array(n), r = 0; r < n; r++) i[r] = arguments[r];
                        var o = new e;
                        t(o, i);
                        var a = [];
                        for (var l in o) o[l] && a.push(l);
                        return a.join(" ")
                    }
                }();
                void 0 !== e && e.exports ? e.exports = n : void 0 !== (r = function () {
                    return n
                }.apply(t, i = [])) && (e.exports = r)
            }()
        }, function (e, t, n) {
            n(50), n(62), n(66), e.exports = n(85)
        }, function (e, t, n) {
            n(28), n(60), e.exports = n(7).Array.from
        }, function (e, t, n) {
            var i = n(18),
                r = n(19);
            e.exports = function (e) {
                return function (t, n) {
                    var o, a, l = String(r(t)),
                        s = i(n),
                        c = l.length;
                    return s < 0 || s >= c ? e ? "" : void 0 : (o = l.charCodeAt(s)) < 55296 || o > 56319 || s + 1 === c || (a = l.charCodeAt(s + 1)) < 56320 || a > 57343 ? e ? l.charAt(s) : o : e ? l.slice(s, s + 2) : a - 56320 + (o - 55296 << 10) + 65536
                }
            }
        }, function (e, t) {
            e.exports = !1
        }, function (e, t, n) {
            "use strict";
            var i = n(33),
                r = n(14),
                o = n(24),
                a = {};
            n(8)(a, n(0)("iterator"), function () {
                return this
            }), e.exports = function (e, t, n) {
                e.prototype = i(a, {
                    next: r(1, n)
                }), o(e, t + " Iterator")
            }
        }, function (e, t, n) {
            var i = n(4),
                r = n(9),
                o = n(21);
            e.exports = n(5) ? Object.defineProperties : function (e, t) {
                r(e);
                for (var n, a = o(t), l = a.length, s = 0; l > s;) i.f(e, n = a[s++], t[n]);
                return e
            }
        }, function (e, t, n) {
            var i = n(6),
                r = n(16),
                o = n(56)(!1),
                a = n(23)("IE_PROTO");
            e.exports = function (e, t) {
                var n, l = r(e),
                    s = 0,
                    c = [];
                for (n in l) n != a && i(l, n) && c.push(n);
                for (; t.length > s;) i(l, n = t[s++]) && (~o(c, n) || c.push(n));
                return c
            }
        }, function (e, t, n) {
            var i = n(16),
                r = n(22),
                o = n(57);
            e.exports = function (e) {
                return function (t, n, a) {
                    var l, s = i(t),
                        c = r(s.length),
                        u = o(a, c);
                    if (e && n != n) {
                        for (; c > u;)
                            if ((l = s[u++]) != l) return !0
                    } else
                        for (; c > u; u++)
                            if ((e || u in s) && s[u] === n) return e || u || 0;
                    return !e && -1
                }
            }
        }, function (e, t, n) {
            var i = n(18),
                r = Math.max,
                o = Math.min;
            e.exports = function (e, t) {
                return (e = i(e)) < 0 ? r(e + t, 0) : o(e, t)
            }
        }, function (e, t, n) {
            var i = n(1).document;
            e.exports = i && i.documentElement
        }, function (e, t, n) {
            var i = n(6),
                r = n(25),
                o = n(23)("IE_PROTO"),
                a = Object.prototype;
            e.exports = Object.getPrototypeOf || function (e) {
                return e = r(e), i(e, o) ? e[o] : "function" == typeof e.constructor && e instanceof e.constructor ? e.constructor.prototype : e instanceof Object ? a : null
            }
        }, function (e, t, n) {
            "use strict";
            var i = n(11),
                r = n(3),
                o = n(25),
                a = n(38),
                l = n(39),
                s = n(22),
                c = n(61),
                u = n(40);
            r(r.S + r.F * !n(41)(function (e) {
                Array.from(e)
            }), "Array", {
                from: function (e) {
                    var t, n, r, h, d = o(e),
                        p = "function" == typeof this ? this : Array,
                        f = arguments.length,
                        y = f > 1 ? arguments[1] : void 0,
                        m = void 0 !== y,
                        g = 0,
                        v = u(d);
                    if (m && (y = i(y, f > 2 ? arguments[2] : void 0, 2)), void 0 == v || p == Array && l(v))
                        for (n = new p(t = s(d.length)); t > g; g++) c(n, g, m ? y(d[g], g) : d[g]);
                    else
                        for (h = v.call(d), n = new p; !(r = h.next()).done; g++) c(n, g, m ? a(h, y, [r.value, g], !0) : r.value);
                    return n.length = g, n
                }
            })
        }, function (e, t, n) {
            "use strict";
            var i = n(4),
                r = n(14);
            e.exports = function (e, t, n) {
                t in e ? i.f(e, t, r(0, n)) : e[t] = n
            }
        }, function (e, t, n) {
            n(63), e.exports = n(7).Object.assign
        }, function (e, t, n) {
            var i = n(3);
            i(i.S + i.F, "Object", {
                assign: n(64)
            })
        }, function (e, t, n) {
            "use strict";
            var i = n(21),
                r = n(65),
                o = n(42),
                a = n(25),
                l = n(34),
                s = Object.assign;
            e.exports = !s || n(12)(function () {
                var e = {},
                    t = {},
                    n = Symbol(),
                    i = "abcdefghijklmnopqrst";
                return e[n] = 7, i.split("").forEach(function (e) {
                    t[e] = e
                }), 7 != s({}, e)[n] || Object.keys(s({}, t)).join("") != i
            }) ? function (e, t) {
                for (var n = a(e), s = arguments.length, c = 1, u = r.f, h = o.f; s > c;)
                    for (var d, p = l(arguments[c++]), f = u ? i(p).concat(u(p)) : i(p), y = f.length, m = 0; y > m;) h.call(p, d = f[m++]) && (n[d] = p[d]);
                return n
            } : s
        }, function (e, t) {
            t.f = Object.getOwnPropertySymbols
        }, function (e, t, n) {
            n(67), n(28), n(68), n(71), n(78), n(81), n(83), e.exports = n(7).Set
        }, function (e, t, n) {
            "use strict";
            var i = n(26),
                r = {};
            r[n(0)("toStringTag")] = "z", r + "" != "[object z]" && n(10)(Object.prototype, "toString", function () {
                return "[object " + i(this) + "]"
            }, !0)
        }, function (e, t, n) {
            for (var i = n(69), r = n(21), o = n(10), a = n(1), l = n(8), s = n(13), c = n(0), u = c("iterator"), h = c("toStringTag"), d = s.Array, p = {
                    CSSRuleList: !0,
                    CSSStyleDeclaration: !1,
                    CSSValueList: !1,
                    ClientRectList: !1,
                    DOMRectList: !1,
                    DOMStringList: !1,
                    DOMTokenList: !0,
                    DataTransferItemList: !1,
                    FileList: !1,
                    HTMLAllCollection: !1,
                    HTMLCollection: !1,
                    HTMLFormElement: !1,
                    HTMLSelectElement: !1,
                    MediaList: !0,
                    MimeTypeArray: !1,
                    NamedNodeMap: !1,
                    NodeList: !0,
                    PaintRequestList: !1,
                    Plugin: !1,
                    PluginArray: !1,
                    SVGLengthList: !1,
                    SVGNumberList: !1,
                    SVGPathSegList: !1,
                    SVGPointList: !1,
                    SVGStringList: !1,
                    SVGTransformList: !1,
                    SourceBufferList: !1,
                    StyleSheetList: !0,
                    TextTrackCueList: !1,
                    TextTrackList: !1,
                    TouchList: !1
                }, f = r(p), y = 0; y < f.length; y++) {
                var m, g = f[y],
                    v = p[g],
                    x = a[g],
                    b = x && x.prototype;
                if (b && (b[u] || l(b, u, d), b[h] || l(b, h, g), s[g] = d, v))
                    for (m in i) b[m] || o(b, m, i[m], !0)
            }
        }, function (e, t, n) {
            "use strict";
            var i = n(70),
                r = n(43),
                o = n(13),
                a = n(16);
            e.exports = n(20)(Array, "Array", function (e, t) {
                this._t = a(e), this._i = 0, this._k = t
            }, function () {
                var e = this._t,
                    t = this._k,
                    n = this._i++;
                return !e || n >= e.length ? (this._t = void 0, r(1)) : "keys" == t ? r(0, n) : "values" == t ? r(0, e[n]) : r(0, [n, e[n]])
            }, "values"), o.Arguments = o.Array, i("keys"), i("values"), i("entries")
        }, function (e, t, n) {
            var i = n(0)("unscopables"),
                r = Array.prototype;
            void 0 == r[i] && n(8)(r, i, {}), e.exports = function (e) {
                r[i][e] = !0
            }
        }, function (e, t, n) {
            "use strict";
            var i = n(72),
                r = n(47);
            e.exports = n(74)("Set", function (e) {
                return function () {
                    return e(this, arguments.length > 0 ? arguments[0] : void 0)
                }
            }, {
                add: function (e) {
                    return i.def(r(this, "Set"), e = 0 === e ? 0 : e, e)
                }
            }, i)
        }, function (e, t, n) {
            "use strict";
            var i = n(4).f,
                r = n(33),
                o = n(44),
                a = n(11),
                l = n(45),
                s = n(17),
                c = n(20),
                u = n(43),
                h = n(73),
                d = n(5),
                p = n(46).fastKey,
                f = n(47),
                y = d ? "_s" : "size",
                m = function (e, t) {
                    var n, i = p(t);
                    if ("F" !== i) return e._i[i];
                    for (n = e._f; n; n = n.n)
                        if (n.k == t) return n
                };
            e.exports = {
                getConstructor: function (e, t, n, c) {
                    var u = e(function (e, i) {
                        l(e, u, t, "_i"), e._t = t, e._i = r(null), e._f = void 0, e._l = void 0, e[y] = 0, void 0 != i && s(i, n, e[c], e)
                    });
                    return o(u.prototype, {
                        clear: function () {
                            for (var e = f(this, t), n = e._i, i = e._f; i; i = i.n) i.r = !0, i.p && (i.p = i.p.n = void 0), delete n[i.i];
                            e._f = e._l = void 0, e[y] = 0
                        },
                        delete: function (e) {
                            var n = f(this, t),
                                i = m(n, e);
                            if (i) {
                                var r = i.n,
                                    o = i.p;
                                delete n._i[i.i], i.r = !0, o && (o.n = r), r && (r.p = o), n._f == i && (n._f = r), n._l == i && (n._l = o), n[y]--
                            }
                            return !!i
                        },
                        forEach: function (e) {
                            f(this, t);
                            for (var n, i = a(e, arguments.length > 1 ? arguments[1] : void 0, 3); n = n ? n.n : this._f;)
                                for (i(n.v, n.k, this); n && n.r;) n = n.p
                        },
                        has: function (e) {
                            return !!m(f(this, t), e)
                        }
                    }), d && i(u.prototype, "size", {
                        get: function () {
                            return f(this, t)[y]
                        }
                    }), u
                },
                def: function (e, t, n) {
                    var i, r, o = m(e, t);
                    return o ? o.v = n : (e._l = o = {
                        i: r = p(t, !0),
                        k: t,
                        v: n,
                        p: i = e._l,
                        n: void 0,
                        r: !1
                    }, e._f || (e._f = o), i && (i.n = o), e[y]++, "F" !== r && (e._i[r] = o)), e
                },
                getEntry: m,
                setStrong: function (e, t, n) {
                    c(e, t, function (e, n) {
                        this._t = f(e, t), this._k = n, this._l = void 0
                    }, function () {
                        for (var e = this, t = e._k, n = e._l; n && n.r;) n = n.p;
                        return e._t && (e._l = n = n ? n.n : e._t._f) ? "keys" == t ? u(0, n.k) : "values" == t ? u(0, n.v) : u(0, [n.k, n.v]) : (e._t = void 0, u(1))
                    }, n ? "entries" : "values", !n, !0), h(t)
                }
            }
        }, function (e, t, n) {
            "use strict";
            var i = n(1),
                r = n(4),
                o = n(5),
                a = n(0)("species");
            e.exports = function (e) {
                var t = i[e];
                o && t && !t[a] && r.f(t, a, {
                    configurable: !0,
                    get: function () {
                        return this
                    }
                })
            }
        }, function (e, t, n) {
            "use strict";
            var i = n(1),
                r = n(3),
                o = n(10),
                a = n(44),
                l = n(46),
                s = n(17),
                c = n(45),
                u = n(2),
                h = n(12),
                d = n(41),
                p = n(24),
                f = n(75);
            e.exports = function (e, t, n, y, m, g) {
                var v = i[e],
                    x = v,
                    b = m ? "set" : "add",
                    w = x && x.prototype,
                    M = {},
                    C = function (e) {
                        var t = w[e];
                        o(w, e, "delete" == e ? function (e) {
                            return !(g && !u(e)) && t.call(this, 0 === e ? 0 : e)
                        } : "has" == e ? function (e) {
                            return !(g && !u(e)) && t.call(this, 0 === e ? 0 : e)
                        } : "get" == e ? function (e) {
                            return g && !u(e) ? void 0 : t.call(this, 0 === e ? 0 : e)
                        } : "add" == e ? function (e) {
                            return t.call(this, 0 === e ? 0 : e), this
                        } : function (e, n) {
                            return t.call(this, 0 === e ? 0 : e, n), this
                        })
                    };
                if ("function" == typeof x && (g || w.forEach && !h(function () {
                        (new x).entries().next()
                    }))) {
                    var E = new x,
                        S = E[b](g ? {} : -0, 1) != E,
                        _ = h(function () {
                            E.has(1)
                        }),
                        D = d(function (e) {
                            new x(e)
                        }),
                        k = !g && h(function () {
                            for (var e = new x, t = 5; t--;) e[b](t, t);
                            return !e.has(-0)
                        });
                    D || ((x = t(function (t, n) {
                        c(t, x, e);
                        var i = f(new v, t, x);
                        return void 0 != n && s(n, m, i[b], i), i
                    })).prototype = w, w.constructor = x), (_ || k) && (C("delete"), C("has"), m && C("get")), (k || S) && C(b), g && w.clear && delete w.clear
                } else x = y.getConstructor(t, e, m, b), a(x.prototype, n), l.NEED = !0;
                return p(x, e), M[e] = x, r(r.G + r.W + r.F * (x != v), M), g || y.setStrong(x, e, m), x
            }
        }, function (e, t, n) {
            var i = n(2),
                r = n(76).set;
            e.exports = function (e, t, n) {
                var o, a = t.constructor;
                return a !== n && "function" == typeof a && (o = a.prototype) !== n.prototype && i(o) && r && r(e, o), e
            }
        }, function (e, t, n) {
            var i = n(2),
                r = n(9),
                o = function (e, t) {
                    if (r(e), !i(t) && null !== t) throw TypeError(t + ": can't set as prototype!")
                };
            e.exports = {
                set: Object.setPrototypeOf || ("__proto__" in {} ? function (e, t, i) {
                    try {
                        (i = n(11)(Function.call, n(77).f(Object.prototype, "__proto__").set, 2))(e, []), t = !(e instanceof Array)
                    } catch (e) {
                        t = !0
                    }
                    return function (e, n) {
                        return o(e, n), t ? e.__proto__ = n : i(e, n), e
                    }
                }({}, !1) : void 0),
                check: o
            }
        }, function (e, t, n) {
            var i = n(42),
                r = n(14),
                o = n(16),
                a = n(31),
                l = n(6),
                s = n(29),
                c = Object.getOwnPropertyDescriptor;
            t.f = n(5) ? c : function (e, t) {
                if (e = o(e), t = a(t, !0), s) try {
                    return c(e, t)
                } catch (e) {}
                if (l(e, t)) return r(!i.f.call(e, t), e[t])
            }
        }, function (e, t, n) {
            var i = n(3);
            i(i.P + i.R, "Set", {
                toJSON: n(79)("Set")
            })
        }, function (e, t, n) {
            var i = n(26),
                r = n(80);
            e.exports = function (e) {
                return function () {
                    if (i(this) != e) throw TypeError(e + "#toJSON isn't generic");
                    return r(this)
                }
            }
        }, function (e, t, n) {
            var i = n(17);
            e.exports = function (e, t) {
                var n = [];
                return i(e, !1, n.push, n, t), n
            }
        }, function (e, t, n) {
            n(82)("Set")
        }, function (e, t, n) {
            "use strict";
            var i = n(3);
            e.exports = function (e) {
                i(i.S, e, {
                    of: function () {
                        for (var e = arguments.length, t = Array(e); e--;) t[e] = arguments[e];
                        return new this(t)
                    }
                })
            }
        }, function (e, t, n) {
            n(84)("Set")
        }, function (e, t, n) {
            "use strict";
            var i = n(3),
                r = n(32),
                o = n(11),
                a = n(17);
            e.exports = function (e) {
                i(i.S, e, {
                    from: function (e) {
                        var t, n, i, l, s = arguments[1];
                        return r(this), (t = void 0 !== s) && r(s), void 0 == e ? new this : (n = [], t ? (i = 0, l = o(s, arguments[2], 2), a(e, !1, function (e) {
                            n.push(l(e, i++))
                        })) : a(e, !1, n.push, n), new this(n))
                    }
                })
            }
        }, function (e, t, n) {
            "use strict";

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            var r = i(n(27)),
                o = i(n(90)),
                a = i(n(91));
            e.exports = {
                icons: r.default,
                toSvg: o.default,
                replace: a.default
            }
        }, function (e, t, n) {
            "use strict";

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var r = Object.assign || function (e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (e[i] = n[i])
                    }
                    return e
                },
                o = function () {
                    function e(e, t) {
                        for (var n = 0; n < t.length; n++) {
                            var i = t[n];
                            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                        }
                    }
                    return function (t, n, i) {
                        return n && e(t.prototype, n), i && e(t, i), t
                    }
                }(),
                a = i(n(48)),
                l = i(n(87)),
                s = function () {
                    function e(t, n) {
                        var i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : [];
                        ! function (e, t) {
                            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                        }(this, e), this.name = t, this.contents = n, this.tags = i, this.attrs = r({}, l.default, {
                            class: "feather feather-" + t
                        })
                    }
                    return o(e, [{
                        key: "toSvg",
                        value: function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                            return "<svg " + function (e) {
                                return Object.keys(e).map(function (t) {
                                    return t + '="' + e[t] + '"'
                                }).join(" ")
                            }(r({}, this.attrs, e, {
                                class: (0, a.default)(this.attrs.class, e.class)
                            })) + ">" + this.contents + "</svg>"
                        }
                    }, {
                        key: "toString",
                        value: function () {
                            return this.contents
                        }
                    }]), e
                }();
            t.default = s
        }, function (e, t) {
            e.exports = {
                xmlns: "http://www.w3.org/2000/svg",
                width: 24,
                height: 24,
                viewBox: "0 0 24 24",
                fill: "none",
                stroke: "currentColor",
                "stroke-width": 2,
                "stroke-linecap": "round",
                "stroke-linejoin": "round"
            }
        }, function (e, t) {
            e.exports = {
                activity: '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>',
                airplay: '<path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon>',
                "alert-circle": '<circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line>',
                "alert-octagon": '<polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line>',
                "alert-triangle": '<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line>',
                "align-center": '<line x1="18" y1="10" x2="6" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="18" y1="18" x2="6" y2="18"></line>',
                "align-justify": '<line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line>',
                "align-left": '<line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line>',
                "align-right": '<line x1="21" y1="10" x2="7" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="7" y2="18"></line>',
                anchor: '<circle cx="12" cy="5" r="3"></circle><line x1="12" y1="22" x2="12" y2="8"></line><path d="M5 12H2a10 10 0 0 0 20 0h-3"></path>',
                aperture: '<circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>',
                "arrow-down-left": '<line x1="18" y1="6" x2="6" y2="18"></line><polyline points="15 18 6 18 6 9"></polyline>',
                "arrow-down-right": '<line x1="6" y1="6" x2="18" y2="18"></line><polyline points="9 18 18 18 18 9"></polyline>',
                "arrow-down": '<line x1="12" y1="4" x2="12" y2="20"></line><polyline points="18 14 12 20 6 14"></polyline>',
                "arrow-left": '<line x1="20" y1="12" x2="4" y2="12"></line><polyline points="10 18 4 12 10 6"></polyline>',
                "arrow-right": '<line x1="4" y1="12" x2="20" y2="12"></line><polyline points="14 6 20 12 14 18"></polyline>',
                "arrow-up-left": '<line x1="18" y1="18" x2="6" y2="6"></line><polyline points="15 6 6 6 6 15"></polyline>',
                "arrow-up-right": '<line x1="6" y1="18" x2="18" y2="6"></line><polyline points="9 6 18 6 18 15"></polyline>',
                "arrow-up": '<line x1="12" y1="20" x2="12" y2="4"></line><polyline points="6 10 12 4 18 10"></polyline>',
                "at-sign": '<circle cx="12" cy="12" r="4"></circle><path d="M16 12v1a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>',
                award: '<circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>',
                "bar-chart-2": '<rect x="10" y="3" width="4" height="18"></rect><rect x="18" y="8" width="4" height="13"></rect><rect x="2" y="13" width="4" height="8"></rect>',
                "bar-chart": '<rect x="18" y="3" width="4" height="18"></rect><rect x="10" y="8" width="4" height="13"></rect><rect x="2" y="13" width="4" height="8"></rect>',
                "battery-charging": '<path d="M5 18H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3.19M15 6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3.19"></path><line x1="23" y1="13" x2="23" y2="11"></line><polyline points="11 6 7 12 13 12 9 18"></polyline>',
                battery: '<rect x="1" y="6" width="18" height="12" rx="2" ry="2"></rect><line x1="23" y1="13" x2="23" y2="11"></line>',
                "bell-off": '<path d="M8.56 2.9A7 7 0 0 1 19 9v4m-2 4H2a3 3 0 0 0 3-3V9a7 7 0 0 1 .78-3.22M13.73 21a2 2 0 0 1-3.46 0"></path><line x1="1" y1="1" x2="23" y2="23"></line>',
                bell: '<path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path>',
                bluetooth: '<polyline points="6.5 6.5 17.5 17.5 12 23 12 1 17.5 6.5 6.5 17.5"></polyline>',
                bold: '<path d="M6 4h8a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path><path d="M6 12h9a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path>',
                book: '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>',
                bookmark: '<path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>',
                box: '<path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line>',
                briefcase: '<rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>',
                calendar: '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>',
                "camera-off": '<line x1="1" y1="1" x2="23" y2="23"></line><path d="M21 21H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3m3-3h6l2 3h4a2 2 0 0 1 2 2v9.34m-7.72-2.06a4 4 0 1 1-5.56-5.56"></path>',
                camera: '<path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle>',
                cast: '<path d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"></path><line x1="2" y1="20" x2="2" y2="20"></line>',
                "check-circle": '<path d="M22 11.07V12a10 10 0 1 1-5.93-9.14"></path><polyline points="23 3 12 14 9 11"></polyline>',
                "check-square": '<polyline points="9 11 12 14 23 3"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>',
                check: '<polyline points="20 6 9 17 4 12"></polyline>',
                "chevron-down": '<polyline points="6 9 12 15 18 9"></polyline>',
                "chevron-left": '<polyline points="15 18 9 12 15 6"></polyline>',
                "chevron-right": '<polyline points="9 18 15 12 9 6"></polyline>',
                "chevron-up": '<polyline points="18 15 12 9 6 15"></polyline>',
                "chevrons-down": '<polyline points="7 13 12 18 17 13"></polyline><polyline points="7 6 12 11 17 6"></polyline>',
                "chevrons-left": '<polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline>',
                "chevrons-right": '<polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline>',
                "chevrons-up": '<polyline points="17 11 12 6 7 11"></polyline><polyline points="17 18 12 13 7 18"></polyline>',
                chrome: '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line>',
                circle: '<circle cx="12" cy="12" r="10"></circle>',
                clipboard: '<path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>',
                clock: '<circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 15 15"></polyline>',
                "cloud-drizzle": '<line x1="8" y1="19" x2="8" y2="21"></line><line x1="8" y1="13" x2="8" y2="15"></line><line x1="16" y1="19" x2="16" y2="21"></line><line x1="16" y1="13" x2="16" y2="15"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="12" y1="15" x2="12" y2="17"></line><path d="M20 16.58A5 5 0 0 0 18 7h-1.26A8 8 0 1 0 4 15.25"></path>',
                "cloud-lightning": '<path d="M19 16.9A5 5 0 0 0 18 7h-1.26a8 8 0 1 0-11.62 9"></path><polyline points="13 11 9 17 15 17 11 23"></polyline>',
                "cloud-off": '<path d="M22.61 16.95A5 5 0 0 0 18 10h-1.26a8 8 0 0 0-7.05-6M5 5a8 8 0 0 0 4 15h9a5 5 0 0 0 1.7-.3"></path><line x1="1" y1="1" x2="23" y2="23"></line>',
                "cloud-rain": '<line x1="16" y1="13" x2="16" y2="21"></line><line x1="8" y1="13" x2="8" y2="21"></line><line x1="12" y1="15" x2="12" y2="23"></line><path d="M20 16.58A5 5 0 0 0 18 7h-1.26A8 8 0 1 0 4 15.25"></path>',
                "cloud-snow": '<path d="M20 17.58A5 5 0 0 0 18 8h-1.26A8 8 0 1 0 4 16.25"></path><line x1="8" y1="16" x2="8" y2="16"></line><line x1="8" y1="20" x2="8" y2="20"></line><line x1="12" y1="18" x2="12" y2="18"></line><line x1="12" y1="22" x2="12" y2="22"></line><line x1="16" y1="16" x2="16" y2="16"></line><line x1="16" y1="20" x2="16" y2="20"></line>',
                cloud: '<path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path>',
                codepen: '<polygon points="12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2"></polygon><line x1="12" y1="22" x2="12" y2="15.5"></line><polyline points="22 8.5 12 15.5 2 8.5"></polyline><polyline points="2 15.5 12 8.5 22 15.5"></polyline><line x1="12" y1="2" x2="12" y2="8.5"></line>',
                command: '<path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path>',
                compass: '<circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>',
                copy: '<rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>',
                "corner-down-left": '<polyline points="9 10 4 15 9 20"></polyline><path d="M20 4v7a4 4 0 0 1-4 4H4"></path>',
                "corner-down-right": '<polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path>',
                "corner-left-down": '<polyline points="14 15 9 20 4 15"></polyline><path d="M20 4h-7a4 4 0 0 0-4 4v12"></path>',
                "corner-left-up": '<polyline points="14 9 9 4 4 9"></polyline><path d="M20 20h-7a4 4 0 0 1-4-4V4"></path>',
                "corner-right-down": '<polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>',
                "corner-right-up": '<polyline points="10 9 15 4 20 9"></polyline><path d="M4 20h7a4 4 0 0 0 4-4V4"></path>',
                "corner-up-left": '<polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>',
                "corner-up-right": '<polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path>',
                cpu: '<rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line>',
                "credit-card": '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line>',
                crop: '<path d="M6.13 1L6 16a2 2 0 0 0 2 2h15"></path><path d="M1 6.13L16 6a2 2 0 0 1 2 2v15"></path>',
                crosshair: '<circle cx="12" cy="12" r="10"></circle><line x1="22" y1="12" x2="18" y2="12"></line><line x1="6" y1="12" x2="2" y2="12"></line><line x1="12" y1="6" x2="12" y2="2"></line><line x1="12" y1="22" x2="12" y2="18"></line>',
                delete: '<path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line>',
                disc: '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="3"></circle>',
                "download-cloud": '<polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path>',
                download: '<path d="M3 17v3a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-3"></path><polyline points="8 12 12 16 16 12"></polyline><line x1="12" y1="2" x2="12" y2="16"></line>',
                droplet: '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>',
                "edit-2": '<polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon>',
                "edit-3": '<polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line>',
                edit: '<path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>',
                "external-link": '<path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line>',
                "eye-off": '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>',
                eye: '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>',
                facebook: '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>',
                "fast-forward": '<polygon points="13 19 22 12 13 5 13 19"></polygon><polygon points="2 19 11 12 2 5 2 19"></polygon>',
                feather: '<path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17" y1="15" x2="9" y2="15"></line>',
                "file-minus": '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="9" y1="15" x2="15" y2="15"></line>',
                "file-plus": '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line>',
                "file-text": '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>',
                file: '<path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline>',
                film: '<rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="7" y2="7"></line><line x1="2" y1="17" x2="7" y2="17"></line><line x1="17" y1="17" x2="22" y2="17"></line><line x1="17" y1="7" x2="22" y2="7"></line>',
                filter: '<polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>',
                flag: '<path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line>',
                folder: '<path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>',
                github: '<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>',
                gitlab: '<path d="M22.65 14.39L12 22.13 1.35 14.39a.84.84 0 0 1-.3-.94l1.22-3.78 2.44-7.51A.42.42 0 0 1 4.82 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 7.49h8.1l2.44-7.51A.42.42 0 0 1 18.6 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 7.51L23 13.45a.84.84 0 0 1-.35.94z"></path>',
                globe: '<circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>',
                grid: '<rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>',
                hash: '<line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line>',
                headphones: '<path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>',
                heart: '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>',
                "help-circle": '<path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="17" x2="12" y2="17"></line>',
                home: '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>',
                image: '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline>',
                inbox: '<polyline points="22 13 16 13 14 16 10 16 8 13 2 13"></polyline><path d="M5.47 5.19L2 13v5a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5l-3.47-7.81A2 2 0 0 0 16.7 4H7.3a2 2 0 0 0-1.83 1.19z"></path>',
                info: '<circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line>',
                instagram: '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"></line>',
                italic: '<line x1="19" y1="4" x2="10" y2="4"></line><line x1="14" y1="20" x2="5" y2="20"></line><line x1="15" y1="4" x2="9" y2="20"></line>',
                layers: '<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline>',
                layout: '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line>',
                "life-buoy": '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line><line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line>',
                "link-2": '<path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"></path><line x1="8" y1="12" x2="16" y2="12"></line>',
                link: '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>',
                list: '<line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line>',
                loader: '<line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>',
                lock: '<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path>',
                "log-in": '<path d="M14 22h5a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-5"></path><polyline points="11 16 15 12 11 8"></polyline><line x1="15" y1="12" x2="3" y2="12"></line>',
                "log-out": '<path d="M10 22H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h5"></path><polyline points="17 16 21 12 17 8"></polyline><line x1="21" y1="12" x2="9" y2="12"></line>',
                mail: '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline>',
                "map-pin": '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle>',
                map: '<polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line>',
                "maximize-2": '<polyline points="15 3 21 3 21 9"></polyline><polyline points="9 21 3 21 3 15"></polyline><line x1="21" y1="3" x2="14" y2="10"></line><line x1="3" y1="21" x2="10" y2="14"></line>',
                maximize: '<path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>',
                menu: '<line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line>',
                "message-circle": '<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>',
                "message-square": '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>',
                "mic-off": '<line x1="1" y1="1" x2="23" y2="23"></line><path d="M9 9v3a3 3 0 0 0 5.12 2.12M15 9.34V4a3 3 0 0 0-5.94-.6"></path><path d="M17 16.95A7 7 0 0 1 5 12v-2m14 0v2a7 7 0 0 1-.11 1.23"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line>',
                mic: '<path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line>',
                "minimize-2": '<polyline points="4 14 10 14 10 20"></polyline><polyline points="20 10 14 10 14 4"></polyline><line x1="14" y1="10" x2="21" y2="3"></line><line x1="3" y1="21" x2="10" y2="14"></line>',
                minimize: '<path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path>',
                "minus-circle": '<circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line>',
                "minus-square": '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line>',
                minus: '<line x1="5" y1="12" x2="19" y2="12"></line>',
                monitor: '<rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line>',
                moon: '<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>',
                "more-horizontal": '<circle cx="12" cy="12" r="2"></circle><circle cx="20" cy="12" r="2"></circle><circle cx="4" cy="12" r="2"></circle>',
                "more-vertical": '<circle cx="12" cy="12" r="2"></circle><circle cx="12" cy="4" r="2"></circle><circle cx="12" cy="20" r="2"></circle>',
                move: '<polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line>',
                music: '<path d="M9 17H5a2 2 0 0 0-2 2 2 2 0 0 0 2 2h2a2 2 0 0 0 2-2zm12-2h-4a2 2 0 0 0-2 2 2 2 0 0 0 2 2h2a2 2 0 0 0 2-2z"></path><polyline points="9 17 9 5 21 3 21 15"></polyline>',
                "navigation-2": '<polygon points="12 2 19 21 12 17 5 21 12 2"></polygon>',
                navigation: '<polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>',
                octagon: '<polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>',
                package: '<path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line><line x1="7" y1="3.5" x2="17" y2="8.5"></line>',
                paperclip: '<path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>',
                "pause-circle": '<circle cx="12" cy="12" r="10"></circle><line x1="10" y1="15" x2="10" y2="9"></line><line x1="14" y1="15" x2="14" y2="9"></line>',
                pause: '<rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect>',
                percent: '<line x1="19" y1="5" x2="5" y2="19"></line><circle cx="6.5" cy="6.5" r="2.5"></circle><circle cx="17.5" cy="17.5" r="2.5"></circle>',
                "phone-call": '<path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                "phone-forwarded": '<polyline points="19 1 23 5 19 9"></polyline><line x1="15" y1="5" x2="23" y2="5"></line><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                "phone-incoming": '<polyline points="16 2 16 8 22 8"></polyline><line x1="23" y1="1" x2="16" y2="8"></line><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                "phone-missed": '<line x1="23" y1="1" x2="17" y2="7"></line><line x1="17" y1="1" x2="23" y2="7"></line><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                "phone-off": '<path d="M10.68 13.31a16 16 0 0 0 3.41 2.6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7 2 2 0 0 1 1.72 2v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.42 19.42 0 0 1-3.33-2.67m-2.67-3.34a19.79 19.79 0 0 1-3.07-8.63A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91"></path><line x1="23" y1="1" x2="1" y2="23"></line>',
                "phone-outgoing": '<polyline points="23 7 23 1 17 1"></polyline><line x1="16" y1="8" x2="23" y2="1"></line><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                phone: '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                "pie-chart": '<path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>',
                "play-circle": '<circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon>',
                play: '<polygon points="5 3 19 12 5 21 5 3"></polygon>',
                "plus-circle": '<circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line>',
                "plus-square": '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line>',
                plus: '<line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line>',
                pocket: '<path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path><polyline points="8 10 12 14 16 10"></polyline>',
                power: '<path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line>',
                printer: '<polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect>',
                radio: '<circle cx="12" cy="12" r="2"></circle><path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"></path>',
                "refresh-ccw": '<polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>',
                "refresh-cw": '<polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>',
                repeat: '<polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path>',
                rewind: '<polygon points="11 19 2 12 11 5 11 19"></polygon><polygon points="22 19 13 12 22 5 22 19"></polygon>',
                "rotate-ccw": '<polyline points="1 4 1 10 7 10"></polyline><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>',
                "rotate-cw": '<polyline points="23 4 23 10 17 10"></polyline><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>',
                save: '<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline>',
                scissors: '<circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line>',
                search: '<circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line>',
                server: '<rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line>',
                settings: '<circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>',
                "share-2": '<circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>',
                share: '<path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line>',
                shield: '<path d="M12 22s8-4 8-10V4l-8-2-8 2v8c0 6 8 10 8 10z"></path>',
                "shopping-cart": '<circle cx="8" cy="21" r="2"></circle><circle cx="20" cy="21" r="2"></circle><path d="M5.67 6H23l-1.68 8.39a2 2 0 0 1-2 1.61H8.75a2 2 0 0 1-2-1.74L5.23 2.74A2 2 0 0 0 3.25 1H1"></path>',
                shuffle: '<polyline points="16 3 21 3 21 8"></polyline><line x1="4" y1="20" x2="21" y2="3"></line><polyline points="21 16 21 21 16 21"></polyline><line x1="15" y1="15" x2="21" y2="21"></line><line x1="4" y1="4" x2="9" y2="9"></line>',
                sidebar: '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line>',
                "skip-back": '<polygon points="19 20 9 12 19 4 19 20"></polygon><line x1="5" y1="19" x2="5" y2="5"></line>',
                "skip-forward": '<polygon points="5 4 15 12 5 20 5 4"></polygon><line x1="19" y1="5" x2="19" y2="19"></line>',
                slack: '<path d="M22.08 9C19.81 1.41 16.54-.35 9 1.92S-.35 7.46 1.92 15 7.46 24.35 15 22.08 24.35 16.54 22.08 9z"></path><line x1="12.57" y1="5.99" x2="16.15" y2="16.39"></line><line x1="7.85" y1="7.61" x2="11.43" y2="18.01"></line><line x1="16.39" y1="7.85" x2="5.99" y2="11.43"></line><line x1="18.01" y1="12.57" x2="7.61" y2="16.15"></line>',
                slash: '<circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>',
                sliders: '<line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line>',
                smartphone: '<rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12" y2="18"></line>',
                speaker: '<rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><circle cx="12" cy="14" r="4"></circle><line x1="12" y1="6" x2="12" y2="6"></line>',
                square: '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>',
                star: '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>',
                "stop-circle": '<circle cx="12" cy="12" r="10"></circle><rect x="9" y="9" width="6" height="6"></rect>',
                sun: '<circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>',
                sunrise: '<path d="M17 18a5 5 0 0 0-10 0"></path><line x1="12" y1="2" x2="12" y2="9"></line><line x1="4.22" y1="10.22" x2="5.64" y2="11.64"></line><line x1="1" y1="18" x2="3" y2="18"></line><line x1="21" y1="18" x2="23" y2="18"></line><line x1="18.36" y1="11.64" x2="19.78" y2="10.22"></line><line x1="23" y1="22" x2="1" y2="22"></line><polyline points="8 6 12 2 16 6"></polyline>',
                sunset: '<path d="M17 18a5 5 0 0 0-10 0"></path><line x1="12" y1="9" x2="12" y2="2"></line><line x1="4.22" y1="10.22" x2="5.64" y2="11.64"></line><line x1="1" y1="18" x2="3" y2="18"></line><line x1="21" y1="18" x2="23" y2="18"></line><line x1="18.36" y1="11.64" x2="19.78" y2="10.22"></line><line x1="23" y1="22" x2="1" y2="22"></line><polyline points="16 5 12 9 8 5"></polyline>',
                tablet: '<rect x="4" y="2" width="16" height="20" rx="2" ry="2" transform="rotate(180 12 12)"></rect><line x1="12" y1="18" x2="12" y2="18"></line>',
                tag: '<path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line>',
                target: '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle>',
                thermometer: '<path d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z"></path>',
                "thumbs-down": '<path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path>',
                "thumbs-up": '<path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>',
                "toggle-left": '<rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect><circle cx="8" cy="12" r="3"></circle>',
                "toggle-right": '<rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect><circle cx="16" cy="12" r="3"></circle>',
                "trash-2": '<polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>',
                trash: '<polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>',
                "trending-down": '<polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline>',
                "trending-up": '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline>',
                triangle: '<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>',
                tv: '<rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline>',
                twitter: '<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>',
                type: '<polyline points="4 7 4 4 20 4 20 7"></polyline><line x1="9" y1="20" x2="15" y2="20"></line><line x1="12" y1="4" x2="12" y2="20"></line>',
                umbrella: '<path d="M23 12a11.05 11.05 0 0 0-22 0zm-5 7a3 3 0 0 1-6 0v-7"></path>',
                underline: '<path d="M6 3v7a6 6 0 0 0 6 6 6 6 0 0 0 6-6V3"></path><line x1="4" y1="21" x2="20" y2="21"></line>',
                unlock: '<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 9.9-1"></path>',
                "upload-cloud": '<polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline>',
                upload: '<path d="M3 17v3a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-3"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="16"></line>',
                "user-check": '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline>',
                "user-minus": '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line>',
                "user-plus": '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line>',
                "user-x": '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line>',
                user: '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>',
                users: '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>',
                "video-off": '<path d="M16 16v1a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2m5.66 0H14a2 2 0 0 1 2 2v3.34l1 1L23 7v10"></path><line x1="1" y1="1" x2="23" y2="23"></line>',
                video: '<polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>',
                voicemail: '<circle cx="5.5" cy="11.5" r="4.5"></circle><circle cx="18.5" cy="11.5" r="4.5"></circle><line x1="5.5" y1="16" x2="18.5" y2="16"></line>',
                "volume-1": '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>',
                "volume-2": '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>',
                "volume-x": '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line>',
                volume: '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>',
                watch: '<circle cx="12" cy="12" r="7"></circle><polyline points="12 9 12 12 13.5 13.5"></polyline><path d="M16.51 17.35l-.35 3.83a2 2 0 0 1-2 1.82H9.83a2 2 0 0 1-2-1.82l-.35-3.83m.01-10.7l.35-3.83A2 2 0 0 1 9.83 1h4.35a2 2 0 0 1 2 1.82l.35 3.83"></path>',
                "wifi-off": '<line x1="1" y1="1" x2="23" y2="23"></line><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55"></path><path d="M5 12.55a10.94 10.94 0 0 1 5.17-2.39"></path><path d="M10.71 5.05A16 16 0 0 1 22.58 9"></path><path d="M1.42 9a15.91 15.91 0 0 1 4.7-2.88"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12" y2="20"></line>',
                wifi: '<path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12" y2="20"></line>',
                wind: '<path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"></path>',
                "x-circle": '<circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line>',
                "x-square": '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line>',
                x: '<line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line>',
                zap: '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>',
                "zoom-in": '<circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line>',
                "zoom-out": '<circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="8" y1="11" x2="14" y2="11"></line>'
            }
        }, function (e, t) {
            e.exports = {
                airplay: ["stream"],
                bell: ["alarm", "notification"],
                settings: ["cog", "edit", "gear", "preferences"],
                star: ["bookmark"],
                x: ["cancel", "close", "delete", "remove"]
            }
        }, function (e, t, n) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var i = function (e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }(n(27));
            t.default = function (e) {
                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                if (!e) throw new Error("The required `key` (icon name) parameter is missing.");
                if (!i.default[e]) throw new Error("No icon matching '" + e + "'. See the complete list of icons at https://feathericons.com");
                return i.default[e].toSvg(t)
            }
        }, function (e, t, n) {
            "use strict";

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var r = Object.assign || function (e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (e[i] = n[i])
                    }
                    return e
                },
                o = i(n(48)),
                a = i(n(27));
            t.default = function () {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                if ("undefined" == typeof document) throw new Error("`feather.replace()` only works in a browser environment.");
                var t = document.querySelectorAll("[data-feather]");
                Array.from(t).forEach(function (t) {
                    return function (e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                            n = function (e) {
                                return Array.from(e.attributes).reduce(function (e, t) {
                                    return e[t.name] = t.value, e
                                }, {})
                            }(e),
                            i = n["data-feather"];
                        delete n["data-feather"];
                        var l = a.default[i].toSvg(r({}, t, n, {
                                class: (0, o.default)(t.class, n.class)
                            })),
                            s = (new DOMParser).parseFromString(l, "image/svg+xml").querySelector("svg");
                        e.parentNode.replaceChild(s, e)
                    }(t, e)
                })
            }
        }])
    })
}, function (e, t) {}, function (e, t) {}]);