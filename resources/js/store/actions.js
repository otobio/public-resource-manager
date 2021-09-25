export default {
    pullResources ({ commit }, filter) {
        let url = '/admin/resources'

        if (filter) {
            url += '?' + new URLSearchParams(filter).toString()
        }

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('PullResource failed!')
                }

                return response.json()
            })
            .then(resources => commit('setResources', resources.data))
            .catch(error => console.error(error))
    },

    deleteResource ({ commit }, resource) {
        fetch(`/admin/resources/${resource.id}`, {
            method: 'DELETE'
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('DeleteResource failed!')
                }

                return true
            })
            .then(ok => commit('dropResource', resource))
            .catch(error => console.error(error))
    },

    saveResource ({ commit }, formData) {
        let url = ''
        if (formData.get('id')) {
            url = `/admin/resources/${formData.get('id')}`
            // Laravel support
            formData.append('_method', 'PUT')
        } else {
            url = `/admin/resources`
        }

        fetch(url, {
            body: formData,
            headers: new Headers({ Accept: 'application/json' }),
            method: 'POST'
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('SaveResource failed!')
                }

                return true
            })
            .then(ok => {
                commit('setCurrentResource', null)
                this.dispatch('pullResources')
            })
            .catch(error => console.error(error))
    }
}
