import { defineStore } from "pinia";

export const useUiHelpersStore = defineStore({
    id: 'ui-helper-store',
    state: () => {
        return {
            _title: '',
        }
    },
    actions: {
        setTitle(title: string) {
            this._title = title
        }
    },
    getters: {
        title: state => state._title
    }
})