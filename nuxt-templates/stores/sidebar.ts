import { defineStore } from "pinia";

export const useSidebarStore = defineStore('sidebar-store', {
    state: () => {
        return {
            _newMessagecount: 0,
        }
    },
    getters: {
        newMessageCount: (state) => state._newMessagecount,
    },
    actions: {
        updateNewMessageCount(value: number) {
            this._newMessagecount += value
        }
    }
})