import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    auth: false,
    notifications: []
  },
  getters: {
    allNotifications(state) {
      return state.notifications;
    },
    allNotificationsCount (state) {
      return state.notifications.length;
    }
  },
  mutations: {
    addNotification(state, notification) {
      return state.notifications.push(notification);
    }
  },
  actions: {

  }
})