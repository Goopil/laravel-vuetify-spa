<template>
  <v-card id="users-list">
    <v-card-title>
      <v-btn fab absolute top right color="success"><v-icon>add</v-icon></v-btn>
      <v-flex md6 xs12>
        <v-text-field
          append-icon="search"
          label="Search"
          single-line
          hide-details
          v-model="search"
        ></v-text-field>
      </v-flex>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="users"
      :search="search"
      :loading="loading"
    >
      <template slot="items" slot-scope="props">
        <td class="text-xs-right">{{ props.item.id }}</td>
        <td class="text-xs-right">{{ props.item.name }}</td>
        <td class="text-xs-right">{{ props.item.email }}</td>
        <td class="text-xs-right">
        <td class="justify-center layout px-0">
          <v-btn icon class="mx-0" @click="$emit('show-user', props.item)">
            <v-icon color="teal">edit</v-icon>
          </v-btn>
          <v-btn icon class="mx-0" @click="$emit('delete-user', props.item)">
            <v-icon color="pink">delete</v-icon>
          </v-btn>
        </td>
      </template>
      <v-alert slot="no-results" :value="true" color="error" icon="warning">
        Your search for "{{ search }}" found no results.
      </v-alert>
    </v-data-table>
  </v-card>
</template>
<style>
  #users-list{
    margin-top: 40px;
  }
</style>
<script>
  export default {
    props: {
      users: {},
      loading: {}
    },
    data: () => ({
      search: '',
      headers: [
        { text: 'Id', value: 'id', align: 'left' },
        { text: 'Name', value: 'name' },
        { text: 'Email', value: 'email' },
        { text: 'Action', value: 'action', align: 'right' },
      ]
    })
  }
</script>
