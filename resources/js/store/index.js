import Vue from 'vue'
import Vuex from 'vuex'
import * as course from './modules/course.js'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        course
    }
})
