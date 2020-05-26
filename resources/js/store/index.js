import Vue from 'vue'
import Vuex from 'vuex'
import * as course from './modules/course.js'
import * as notification from './modules/notification.js'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        course,
        notification
    }
})
