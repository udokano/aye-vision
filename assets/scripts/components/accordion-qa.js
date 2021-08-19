import Vue from 'vue';


Vue.component("accordion-qa", {
    template: `
    <dl class="p-faq-archive__contents">
        <dt class="p-faq-archive__row p-faq-archive__row--ttl" @click="open()"><svg class="p-faq-archive__icon p-faq-archive__icon--q"><use xlink:href="#svg-icon-q"></use></svg>
            <p class="p-faq-archive__ttl"><slot name="title"></slot></p>
                <transition name="rotate" mode="out-in">

                                                            <svg class="p-faq-archive__toggle" v-if="isOpen" key="rotate1"><use xlink:href="#svg-icon-ac-open"></use></svg>
                                                            <svg class="p-faq-archive__toggle" v-else key="rotate2"><use xlink:href="#svg-icon-ac"></use></svg>

                </transition>
        </dt>
                                                    <transition name="open">
													<dd class="p-faq-archive__row p-faq-archive__row--answer" v-if="isOpen">
														<svg class="p-faq-archive__icon p-faq-archive__icon--a"><use xlink:href="#svg-icon-a"></use></svg>
														<p class="p-faq-archive__answer">
                                                             <slot name="content"></slot>
                                                        </p>
													</dd> </transition>
    </dl>`,
    data: function () {
        return {
            isOpen: false
        }
    },
    methods: {
        open: function () {
            this.isOpen = !this.isOpen;
        }
    }
});


new Vue({
    el: "#js-app-qa"
});
