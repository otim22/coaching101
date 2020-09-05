import Vue from 'vue'
import Vuex from 'vuex'
import * as subject from './modules/subject.js'
import * as notification from './modules/notification.js'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        subject,
        notification
    }
})
