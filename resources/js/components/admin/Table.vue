<template>
  <div class="mt-3">
    <label>Field Table:</label>
    <b-row v-for="(field,k) in fieldsState" :key="k" class="mb-3">
      <b-col class="col-md-3">
        <label :for="`field-label-${k}`">Label</label>
        <b-form-input
          :id="`field-label-${k}`"
          class="mb-2 mr-sm-2 mb-sm-0"
          placeholder="Label"
          v-model="field.label"
        ></b-form-input>
      </b-col>
      <b-col class="col-md-4">
        <label :for="`field-name-${k}`">Name</label>
        <b-form-input
          :id="`field-name-${k}`"
          class="mb-2 mr-sm-2 mb-sm-0"
          placeholder="Name"
          v-model="field.key"
          v-kebabcase
        ></b-form-input>
      </b-col>
      <b-col class="col-md-3">
        <label :for="`field-type-${k}`">Type</label>
        <b-form-select :id="`field-type-${k}`" v-model="field.type" :options="types"></b-form-select>
      </b-col>
      <b-col class="col-md-2">
        <div class="d-flex align-items-end h-100">
          <b-button class="mr-2" v-show="k || ( !k && fieldsState.length > 1)" @click="remove(k)">
              <i class="fas fa-minus-circle"></i>
          </b-button>
          <b-button v-show="k == fieldsState.length-1" @click="add(k)">
              <i class="fas fa-plus-circle"></i>
          </b-button>
        </div>
      </b-col>
    </b-row>
    <b-form inline class="mt-3">
      <label class="mr-1" for="inline-form-input-name">Row: </label>
      <b-form-input
        id="inline-form-input-name"
        class="mb-2 mr-sm-2 mb-sm-0"
        placeholder="Row"
        v-model="rowCounter"
        type="number"
        min="1"
      ></b-form-input>

      <label class="mr-1" for="inline-form-input-username">Column: </label>
      <b-form-input
        id="inline-form-input-name"
        class="mb-2 mr-sm-2 mb-sm-0"
        placeholder="Column"
        v-model="columnCounter"
        type="number"
        disabled
      ></b-form-input>

      <b-button @click="createTable" variant="primary">{{ tableItems.length ? 'Update' : 'Create' }} Table</b-button>
    </b-form>
    <b-table class="mt-3" :items="tableItems" :fields="fieldsState">
      <template v-for="(field, index) in fieldsState" #[`cell(${field.key})`]="data">
        <b-form-datepicker v-if="field.type === 'date' && tableItems[data.index].isEdit" :key="index" :type="field.type" :value="tableItems[data.index][field.key]" @input="(value) => inputHandler(value, data.index, field.key)"></b-form-datepicker>
        <b-form-select v-else-if="field.type === 'select' && tableItems[data.index].isEdit" :key="index" :value="tableItems[data.index][field.key]" @input="(value) => inputHandler(value, data.index, field.key)" :options="field.options"></b-form-select>
        <b-form-checkbox v-else-if="field.type === 'checkbox' && tableItems[data.index].isEdit" :key="index" :v-model="tableItems[data.index][field.key]" @input="(value) => inputHandler(value, data.index, field.key)" :value="field.value"></b-form-checkbox>
        <b-form-radio v-else-if="field.type === 'radio' && tableItems[data.index].isEdit" :key="index" :v-model="tableItems[data.index][field.key]" @input="(value) => inputHandler(value, data.index, field.key)" :value="field.value"></b-form-radio>
        <b-button :key="index" v-else-if="field.type === 'edit'" @click="editRowHandler(data)">
          <span v-if="!tableItems[data.index].isEdit">Edit</span>
          <span v-else>Done</span>
        </b-button>
        <b-form-input v-else-if="field.type && tableItems[data.index].isEdit" :key="index" :type="field.type" :value="tableItems[data.index][field.key]" @blur="(e) => inputHandler(e.target.value, data.index, field.key)"></b-form-input>
        <span :key="index" v-else>{{data.value}}</span>
      </template>
    </b-table>
  </div>
</template>

<script>
export default {
    name: "question_table",
    props: {
      value: {
        type: Array,
        default: () => []
      },
      fields: {
        type: Array,
        default: () => [
          { key: '', label: "", type: 'text' },
        ]
      },
    },
    components: {},
    data() {
      return {
        fieldsState: this.fields.map(field => ({...field, isEdit: true})),
        tableItems: this.value.map(item => ({...item, isEdit: true})),
        rowCounter: this.value.length,
        columnCounter: this.fields.length,
        types: [
          { value: null, text: 'Please select an option' },
          { value: 'text', text: 'Text' },
          { value: 'number', text: 'Number' },
          { value: 'date', text: 'Date' },
          { value: 'checkbox', text: 'Checkbox' },
          { value: 'radio', text: 'Radio' },
        ]
      };
    },
    methods: {
      editRowHandler(data) {
        this.tableItems[data.index].isEdit = !this.tableItems[data.index].isEdit;
      },
      inputHandler(value, index, key) {
        this.tableItems[index][key] = value;
        this.$set(this.tableItems, index, this.tableItems[index]);
      },
      createTable() {
        let _fields = this.fieldsState.filter(field => field.key && field.type);
        let _tableItems = this.tableItems;
        if (_fields.length) {
          if (this.rowCounter) {
            let _rowCounter = this.rowCounter;
            let _columnCounter = this.columnCounter;
            let _tableItemsLength = _tableItems.length;
            if (_rowCounter > _tableItemsLength) {
              for (let i = 0; i < _rowCounter - _tableItemsLength; i++) {
                let _item = {};
                _fields.forEach(field => {
                  _item[field.key] = '';
                });
                _tableItems.push(_item);
              }
            } else if (_rowCounter < _tableItemsLength) {
              _tableItems.splice(_rowCounter, _tableItemsLength - _rowCounter);
            }
            if (_columnCounter) {
              _tableItems.forEach((item, index) => {
                let _item = {};
                _fields.forEach(field => {
                  _item[field.key] = item[field.key] || '';
                });
                _tableItems[index] = _item;
              });
            }
          }
          this.fields = _fields;
          _tableItems.forEach(item => {
            item.isEdit = true;
          });
          this.tableItems = _tableItems;
          this.$emit("input", this.tableItems);
        }
        const data = {
          fields: this.fieldsState,
          value: this.tableItems
        }
        this.$emit("update-question", data);
      },
      add () {
        this.fieldsState.push({ key: '', label: "", type: 'text' })
      },
      remove (index) {
        this.fieldsState.splice(index, 1);
      },
    },
    watch: {
      fieldsState: {
        handler: function (val) {
          this.columnCounter = val.length;
        },
        deep: true
      },
      // rowCounter: {
      //   handler: function (val) {
      //     this.tableItems = [];
      //     for (let i = 0; i < val; i++) {
      //       this.tableItems.push({isEdit: false});
      //     }
      //   },
      //   deep: true
      // }
    },
    mounted() {},
    computed: {},
};
</script>
