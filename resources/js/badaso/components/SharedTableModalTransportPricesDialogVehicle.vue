<template>
  <div style="
    max-height: 80vh;
    overflow-y: scroll;
    padding: 15px 15px 0px 15px; background: #e5feff;
">

    <stack-modal v-if="slug"
            :show="show"
            title=""
            @close="show=false"
            :modal-class="{ [modalClass]: true }"
            :saveButton="{ visible: false }"
            :cancelButton="{ title: 'Close', btnClass: { 'btn btn-primary': true } }"
        >
        <slot name="modal-header">
            <div class="modal-header">
                <h3 class="modal-title">
                    Detail
                </h3>
                <vs-button @click="show=false">
                    <i class="vs-icon notranslate icon-scale material-icons null">close</i>
                </vs-button>
            </div>
        </slot>

        <shared-read-user :response="{
            data: selectedData
        }" :slug="slug"></shared-read-user>

        <div slot="modal-footer"></div>
    </stack-modal>

    <template v-if="!showMaintenancePage">
      <!-- <badaso-breadcrumb-hover full>
        <template slot="action">
          <download-excel
            :data="records"
            :fields="fieldsForExcel"
            :worksheet="dataType.displayNameSingular"
            :name="dataType.displayNameSingular + '.xls'"
            class="crud-generated__excel-button"
          >
            <badaso-dropdown-item
              icon="file_upload"
              v-if="$helper.isAllowedToModifyGeneratedCRUD('browse', dataType)"
            >
              {{ $t("action.exportToExcel") }}
            </badaso-dropdown-item>
          </download-excel>
          <badaso-dropdown-item
            icon="file_upload"
            v-if="$helper.isAllowedToModifyGeneratedCRUD('browse', dataType)"
            @click="generatePdf"
          >
            {{ $t("action.exportToPdf") }}
          </badaso-dropdown-item>
          <badaso-dropdown-item
            icon="add"
            :to="{ name: 'CrudGeneratedAdd' }"
            v-if="
              isCanAdd &&
              $helper.isAllowedToModifyGeneratedCRUD('add', dataType)
            "
          >
            {{ $t("action.add") }}
          </badaso-dropdown-item>
          <badaso-dropdown-item
            icon="list"
            :to="{ name: 'CrudGeneratedSort' }"
            v-if="
              isCanSort &&
              $helper.isAllowedToModifyGeneratedCRUD('edit', dataType)
            "
          >
            {{ $t("action.sort") }}
          </badaso-dropdown-item>
          <badaso-dropdown-item
            icon="delete_sweep"
            v-if="
              selected.length > 0 &&
              $helper.isAllowedToModifyGeneratedCRUD('delete', dataType)
            "
            @click.stop
            @click="confirmDeleteMultiple"
          >
            {{ $t("action.bulkDelete") }}
          </badaso-dropdown-item>
          <badaso-dropdown-item
            icon="restore"
            v-if="selected.length > 0 && isShowDataRecycle"
            @click.stop
            @click="confirmRestoreMultiple"
          >
            {{ $t("action.bulkRestore") }}
          </badaso-dropdown-item>
          <badaso-dropdown-item
            icon="settings"
            v-if="
              $helper.isAllowedToModifyGeneratedCRUD('maintenance', dataType)
            "
            @click.stop
            @click="openMaintenanceDialog"
          >
            {{ $t("crudGenerated.maintenanceDialog.title") }}
          </badaso-dropdown-item>
          <badaso-dropdown-item
            v-if="dataType.isSoftDelete"
            icon="restore_from_trash"
            @click.stop
            :to="{ name: 'CrudGeneratedBrowseBin' }"
          >
            {{ $t("action.showTrash") }}
          </badaso-dropdown-item>
        </template>
      </badaso-breadcrumb-hover> -->

      <vs-row v-if="$helper.isAllowedToModifyGeneratedCRUD('browse', dataType)">
        <vs-col vs-lg="12">
          <vs-alert
            :active="Object.keys(errors).length > 0"
            color="danger"
            icon="new_releases"
            class="crud-generated__errors"
          >
            <span v-for="key in Object.keys(errors)" :key="key">
              <span v-for="err in errors[key]" :key="err">
                {{ err }}
              </span>
            </span>
          </vs-alert>
        </vs-col>
        <vs-col vs-lg="12">
          <vs-card>
            <!-- <div slot="header">
              <h3>{{ dataType.displayNameSingular }}</h3>
            </div> -->
            <div slot="header">
              <div class="row">
                <div class="col pr-0 d-flex align-items-end">
                  <vs-input
                    icon-after="true"
                    label-placeholder="icon-after"
                    icon="search"
                    placeholder="Pencarian Data"
                    v-model="search"
                    @input="onSearch($event)"
                  />
                </div>
                <div class="col-auto d-flex align-items-end justify-content-end">
                  <vs-button @click="onClear" color="danger" icon="close"></vs-button>
                </div>
              </div>
            </div>
            <div>
              <shared-badaso-table ref="badaso_table_1"
                v-if="dataType.serverSide !== 1" :lastPage="lastPage" :currentPage="currentPage" :perPage="perPage"
                @onChangePage="onChangePage"
                @onChangeMaxItems="onChangeMaxItems"
                v-model="selected"
                pagination
                :max-items="descriptionItems[0]"
                search
                :data="records"
                stripe
                description
                :description-items="descriptionItems"
                :description-title="$t('crudGenerated.footer.descriptionTitle')"
                :description-connector="
                  $t('crudGenerated.footer.descriptionConnector')
                "
                :description-body="$t('crudGenerated.footer.descriptionBody')"
                :multiple="false"
              >
                <template slot="thead">
                    <vs-th v-if="slug"> </vs-th>
                    <vs-th> {{ $t("crudGenerated.header.action") }} </vs-th>
                    <vs-th
                        v-for="(dataRow, index) in dataType.dataRows"
                        :key="index"
                        :sort-key="$caseConvert.stringSnakeToCamel(dataRow.field)"
                    >
                        <template v-if="dataRow.browse == 1">
                        {{ dataRow.displayName }}
                        </template>
                    </vs-th>
                </template>

                <template slot-scope="{ data }">
                  <vs-tr
                    :data="record"
                    :key="index"
                    v-for="(record, index) in data"
                    :state="
                      idsOfflineDeleteRecord.includes(record.id.toString())
                        ? 'danger'
                        : 'default'
                    "
                  >
                    <template
                      v-if="
                        !idsOfflineDeleteRecord.includes(
                          record.id.toString()
                        ) || !isOnline
                      "
                    >

                        <vs-td v-if="slug" class="crud-generated__button">
                            <vs-button @click="show=true; selectedData=record;">
                                <vs-icon icon="visibility" style="font-size: 18px;" class=""></vs-icon>
                            </vs-button>
                        </vs-td>

                        <vs-td class="crud-generated__button">
                            <vs-button type="relief" @click="$emit('onBubbleEvent', data[index])">Pilih</vs-button>
                        </vs-td>

                      <vs-td
                        v-for="(dataRow, indexColumn) in dataType.dataRows"
                        :key="indexColumn"
                        :data="
                          data[index][
                            $caseConvert.stringSnakeToCamel(dataRow.field)
                          ]
                        "
                      >
                        <template v-if="dataRow.browse == 1">
                          <img
                            v-if="dataRow.type == 'upload_image'"
                            :src="`${
                              record[
                                $caseConvert.stringSnakeToCamel(dataRow.field)
                              ]
                            }`"
                            width="20%"
                            alt=""
                          />
                          <div
                            v-else-if="dataRow.type == 'upload_image_multiple'"
                            class="crud-generated__item--upload-image-multiple"
                          >
                            <img
                              v-for="(image, indexImage) in stringToArray(
                                record[
                                  $caseConvert.stringSnakeToCamel(dataRow.field)
                                ]
                              )"
                              :key="indexImage"
                              :src="`${image}`"
                              width="20%"
                              alt=""
                              class="crud-generated__item--image"
                            />
                          </div>
                          <span
                            v-else-if="dataRow.type == 'editor'"
                            v-html="
                              record[
                                $caseConvert.stringSnakeToCamel(dataRow.field)
                              ]
                            "
                          ></span>
                          <a
                            v-else-if="dataRow.type == 'url'"
                            :href="
                              record[
                                $caseConvert.stringSnakeToCamel(dataRow.field)
                              ]
                            "
                            target="_blank"
                            >{{
                              record[
                                $caseConvert.stringSnakeToCamel(dataRow.field)
                              ]
                            }}</a
                          >
                          <a
                            v-else-if="dataRow.type == 'upload_file'"
                            :href="`${
                              record[
                                $caseConvert.stringSnakeToCamel(dataRow.field)
                              ]
                            }`"
                            target="_blank"
                            >{{
                              record[
                                $caseConvert.stringSnakeToCamel(dataRow.field)
                              ]
                            }}</a
                          >
                          <div
                            v-else-if="dataRow.type == 'upload_file_multiple'"
                            class="crud-generated__item--upload-file-multiple"
                          >
                            <p
                              v-for="(file, indexFile) in arrayToString(
                                record[
                                  $caseConvert.stringSnakeToCamel(dataRow.field)
                                ]
                              )"
                              :key="indexFile"
                            >
                              <a :href="`${file}`" target="_blank">{{
                                file
                              }}</a>
                            </p>
                          </div>
                          <p
                            v-else-if="
                              dataRow.type == 'radio' ||
                              dataRow.type == 'select'
                            "
                          >
                            {{
                              bindSelection(
                                dataRow.details.items,
                                record[
                                  $caseConvert.stringSnakeToCamel(dataRow.field)
                                ]
                              )
                            }}
                          </p>
                          <div
                            v-else-if="
                              dataRow.type == 'select_multiple' ||
                              dataRow.type == 'checkbox'
                            "
                            class="crud-generated__item--select-multiple"
                          >
                            <p
                              v-for="(selected, indexSelected) in stringToArray(
                                record[
                                  $caseConvert.stringSnakeToCamel(dataRow.field)
                                ]
                              )"
                              :key="indexSelected"
                            >
                              {{
                                bindSelection(dataRow.details.items, selected)
                              }}
                            </p>
                          </div>
                          <div v-else-if="dataRow.type == 'color_picker'">
                            <div
                              class="crud-generated__item--color-picker"
                              :style="`background-color: ${
                                record[
                                  $caseConvert.stringSnakeToCamel(dataRow.field)
                                ]
                              }`"
                            ></div>
                            {{
                              record[
                                $caseConvert.stringSnakeToCamel(dataRow.field)
                              ]
                            }}
                          </div>
                          <span v-else-if="dataRow.type == 'relation'">{{
                            displayRelationData(record, dataRow)
                          }}</span>
                            <div v-else>
                                <!-- {{ record }} -->
                                <div v-if="
                                    dataRow.field == 'user_id' ||
                                    dataRow.field == 'profile_id' ||
                                    dataRow.field == 'skill_id'
                                    ">
                                    <span v-html="record?.userColumn"></span>
                                    <!-- (<i>{{ record?.badasoUser?.username }}</i>) {{ record?.badasoUser?.name }} -->
                                </div>
                                <span v-else-if="dataRow.field == 'year_exp'">
                                    {{ $formatDate(record?.yearExp) }}
                                </span>
                                <span v-else>
                                    {{
                                        record[
                                        $caseConvert.stringSnakeToCamel(dataRow.field)
                                        ]
                                    }}
                                </span>
                            </div>
                        </template>
                      </vs-td>

                    </template>
                  </vs-tr>
                </template>
              </shared-badaso-table>
            </div>
          </vs-card>
        </vs-col>
        <vs-prompt
          @accept="saveMaintenanceState"
          :active.sync="maintenanceDialog"
        >
          <vs-row>
            <badaso-switch
              :label="$t('crudGenerated.maintenanceDialog.switch')"
              :placeholder="$t('crudGenerated.maintenanceDialog.switch')"
              v-model="isMaintenance"
              size="12"
              :alert="errors['is_maintenance']"
            ></badaso-switch>
          </vs-row>
        </vs-prompt>
      </vs-row>
      <vs-row v-else>
        <vs-col vs-lg="12">
          <vs-card>
            <vs-row>
              <vs-col vs-lg="12">
                <h3>
                  {{
                    $t("crudGenerated.warning.notAllowedToBrowse", {
                      tableName: dataType.displayNameSingular,
                    })
                  }}
                </h3>
              </vs-col>
            </vs-row>
          </vs-card>
        </vs-col>
      </vs-row>
    </template>
    <template v-if="showMaintenancePage">
      <badaso-breadcrumb-row full> </badaso-breadcrumb-row>

      <vs-row v-if="$helper.isAllowedToModifyGeneratedCRUD('browse', dataType)">
        <vs-col vs-lg="12">
          <div class="badaso-maintenance__container">
            <img :src="`${maintenanceImg}`" alt="Maintenance Icon" />
            <h1 class="badaso-maintenance__text">
              We are under <br />maintenance
            </h1>
          </div>
        </vs-col>
      </vs-row>
    </template>
  </div>
</template>

<script>
import StackModal from '@innologica/vue-stackable-modal'

import ShadedBadasoTable from "./ShadedBadasoTable.vue"
import * as _ from "lodash";
import downloadExcel from "vue-json-excel";
import jsPDF from "jspdf";
import "jspdf-autotable";
import moment from "moment";
export default {
  components: { downloadExcel, "shared-badaso-table": ShadedBadasoTable, StackModal },
  name: "CrudGeneratedBrowse",
  props: {
    slug: {
        default: null,
    },
    label: {
        default:'',
    },
    rental_id: null,
  },
  data: () => ({
    errors: {},
    data: {},
    descriptionItems: [5, 10, 25, 50, 75, 100],
    selected: [],
    records: [],
    dataType: [],
    willDeleteId: null,
    isCanAdd: false,
    isCanEdit: false,
    isCanRead: false,
    isCanSort: false,
    totalItem: 0,
    filter: "",
    page: 1,
    limit: 10,
    orderField: "",
    orderDirection: "",
    rowPerPage: null,
    fieldsForExcel: {},
    fieldsForPdf: [],
    idsOfflineDeleteRecord: [],
    maintenanceDialog: false,
    isMaintenance: false,
    showMaintenancePage: false,
    isShowDataRecycle: false,
    search:'',

    show: false,
    modalClass: 'modal-xl',
    selectedData: null,

    lastPage: 0,
    currentPage: 1,
    perPage: 25
  }),
  watch: {
    $route: {
        immediate: true,
        handler (to, from) {
          this.getEntity();
        }
    },
    // page: function(to, from) {
    //   this.handleChangePage(to);
    // },
    // limit: function(to, from) {
    //   this.handleChangeLimit(to);
    // },
  },
  mounted() {
    if (this.$route.query.search || this.$route.query.page) {
      this.filter = this.$route.query.search;
      this.page = this.$route.query.page;
      this.show = this.$route.query.show;
    }
    // this.getEntity();
    this.loadIdsOfflineDelete();
  },
  methods: {
    onSearch(val) {
      this.search = val;
      this.getEntity();
    },
    onClear() {
      this.search = "";
      this.getEntity();
      this.$refs?.SharedSelectAvailable?.onClear();
    },
    onChangePage(val) {
        this.currentPage = val;
        this.getEntity();
    },
    onChangeMaxItems(val) {
        this.currentPage = 1; // reset ke page 1
        this.perPage = val;
        this.getEntity();
    },
    getDownloadUrl(item) {
      if (item == null || item == undefined) return;

      return item.split("storage").pop();
    },
    confirmDeleteDataPending(id) {
      this.willDeleteId = id;
      this.$vs.dialog({
        type: "confirm",
        color: "danger",
        title: this.$t("action.delete.title"),
        text: this.$t("action.delete.text"),
        accept: () => this.deleteRecordDataPending(id),
        acceptText: this.$t("action.delete.accept"),
        cancelText: this.$t("action.delete.cancel"),
        cancel: () => {
          this.willDeleteId = null;
        },
      });
    },
    confirmDelete(id) {
      this.willDeleteId = id;
      this.$vs.dialog({
        type: "confirm",
        color: "danger",
        title: this.$t("action.delete.title"),
        text: this.$t("action.delete.text"),
        accept: this.deleteRecord,
        acceptText: this.$t("action.delete.accept"),
        cancelText: this.$t("action.delete.cancel"),
        cancel: () => {
          this.willDeleteId = null;
        },
      });
    },
    confirmDeleteMultiple(id) {
      this.$vs.dialog({
        type: "confirm",
        color: "danger",
        title: this.$t("action.delete.title"),
        text: this.$t("action.delete.text"),
        accept: this.deleteRecords,
        acceptText: this.$t("action.delete.accept"),
        cancelText: this.$t("action.delete.cancel"),
        cancel: () => {},
      });
    },
    getEntity: _.debounce(async function () {
    // async getEntity() {
      this.$openLoader();
      try {
        const {
            data: {
                data, total, lastPage, currentPage, perPage
            }
        } = await this.$api.badasoEntity.browse({
            label: this.label, // digunakan pada Model Accessor buat modifikasi field
          slug: this.slug, // $route.params.slug,
          limit: this.limit,
          page: this.page,
          filterValue: this.filter,
          orderField: this.$caseConvert.snake(this.orderField),
          orderDirection: this.$caseConvert.snake(this.orderDirection),
          showSoftDelete: this.isShowDataRecycle,
          search: this.search,

          perPage: this.perPage,
          page: this.currentPage,

          rental_id: this.rental_id,
        });

        this.lastPage = lastPage
        this.currentPage = currentPage
        this.perPage = perPage
        let response = {
            data: {
                data,
                total,
            }
        }
        // response['data'] = responseX.data
        // response['data']['data'] = data
        // response['data']['total'] = total
        // console.log('getEntity', response)
        // return
        // console.log(this.$refs.badaso_table_1.loadData())

        const {
          data: { dataType },
        } = await this.$api.badasoTable.getDataType({
          slug: this.slug, // $route.params.slug,
        });
        this.$closeLoader();
        this.data = response.data;
        this.records = response.data.data;
        this.records.map((record) => {
          if (record.createdAt || record.updatedAt) {
            record.createdAt = moment(record.createdAt).format(
              "YYYY-MM-DD hh:mm:ss"
            );
            record.updatedAt = moment(record.updatedAt).format(
              "YYYY-MM-DD hh:mm:ss"
            );
          }
          return record;
        });

        console.log('getEntity this.records', this.records)


        this.totalItem =
          response.data.total > 0
            ? Math.ceil(response.data.total / this.limit)
            : 1;

        this.dataType = dataType;
        this.isMaintenance = this.dataType.isMaintenance == 1;
        const dataRows = this.dataType.dataRows.map((data) => {
          try {
            data.details = JSON.parse(data.details);
          } catch (error) {}
          return data;
        });
        this.dataType.dataRows = JSON.parse(JSON.stringify(dataRows));
        const addFields = dataRows.filter((row) => row.add == 1);
        const editFields = dataRows.filter((row) => row.edit == 1);
        const readFields = dataRows.filter((row) => row.read == 1);
        this.isCanAdd = addFields.length > 0;
        this.isCanEdit = editFields.length > 0;
        this.isCanRead = readFields.length > 0;
        if (this.dataType.orderColumn && this.dataType.orderDisplayColumn) {
          this.isCanSort = true;
        }
        this.prepareExcelExporter();
      } catch (error) {
        if (error.status == 503) {
          this.showMaintenancePage = true;
        }
        this.$closeLoader();
        this.$vs.notify({
          title: this.$t("alert.danger"),
          text: error.message,
          color: "danger",
        });
      }
    }, 500),
    deleteRecordDataPending(id) {
      try {
        const keyStore = window.location.pathname;
        this.$readObjectStore(keyStore).then((store) => {
          if (store.result) {
            const data = store.result.data;
            const newData = [];

            for (const indexData in data) {
              const itemData = data[indexData].requestData.data;
              for (const indexItem in itemData) {
                const fieldData = itemData[indexItem];
                if (fieldData.field == "ids") {
                  let valueIds = fieldData.value.split(",");
                  valueIds = valueIds.filter((valueId, index) => valueId != id);
                  if (valueIds.length != 0) {
                    data[indexData].requestData.data[indexItem].value =
                      valueIds.join(",");

                    newData[newData.length] = data[indexData];
                  }
                } else {
                  const valueId = fieldData.value;
                  if (valueId.toString() != id.toString()) {
                    newData[newData.length] = data[indexData];
                  }
                }
              }
            }
            this.$setObjectStore(keyStore, { data: newData });

            this.idsOfflineDeleteRecord = this.idsOfflineDeleteRecord.filter(
              (itemId, index) => itemId != id
            );
          }
        });
      } catch (error) {
        console.error(error);
      }
    },

    bindSelection(items, value) {
      const selected = _.find(items, ["value", value]);
      if (selected) {
        return selected.label;
      } else {
        return value;
      }
    },
    stringToArray(str) {
      if (str) {
        return str.split(",");
      } else {
        return [];
      }
    },
    arrayToString(files) {
      if (files) {
        const mixArray = files;
        const str = mixArray.replace(/\[|\]|"/g, "").split(",");
        return str;
      } else {
        return [];
      }
    },
    handleSearch(e) {
      this.filter = e.target.value;
      this.page = 1;
      this.$router
        .replace({
          query: {
            search: this.filter,
            page: this.page,
            show: this.limit,
          },
        })
        .catch((err) => {
          console.log(err);
        });
      this.getEntity();
    },
    handleChangePage(page) {
      this.page = page;
      this.$router
        .replace({
          query: {
            search: this.filter,
            page: this.page,
            show: this.limit,
          },
        })
        .catch((err) => {
          console.log(err);
        });
      this.getEntity();
    },
    handleChangeLimit(limit) {
      this.page = 1;
      this.limit = limit;
      this.$router
        .replace({
          query: {
            search: this.filter,
            page: this.page,
            show: this.limit,
          },
        })
        .catch((err) => {
          console.log(err);
        });
      this.getEntity();
    },
    handleSort(field, direction) {
      this.orderField = field;
      this.orderDirection = direction;
      this.getEntity();
    },
    handleSelect(data) {
      this.selected = data;
    },
    displayRelationData(record, dataRow) {
      if (dataRow.relation) {
        const relationType = dataRow.relation.relationType;
        const table = this.$caseConvert.stringSnakeToCamel(
          dataRow.relation.destinationTable
        );
        this.$caseConvert.stringSnakeToCamel(
          dataRow.relation.destinationTableColumn
        );
        const displayColumn = this.$caseConvert.stringSnakeToCamel(
          dataRow.relation.destinationTableDisplayColumn
        );
        if (relationType == "has_one") {
          const list = record[table];
          return list[displayColumn] ? list[displayColumn] : null;
        } else if (relationType == "has_many") {
          const list = record[table];
          const flatList = list.map((ls) => {
            return ls[displayColumn];
          });
          return flatList.join(", ");
        } else if(relationType == "belongs_to"){
          const lists = record[table];
          let field = this.$caseConvert.stringSnakeToCamel(dataRow.field)
          for(let list of lists){
            if (list.id == record[field]){
              return list[displayColumn];
            }
          }
        }  else if (relationType == "belongs_to_many") {
          let field = this.$caseConvert.stringSnakeToCamel(dataRow.field)
          const lists = record[field]
          let flatList = []
          Object.keys(lists).forEach(function (ls, key) {
            flatList.push(lists[ls][displayColumn]);
          });
          return flatList.join(",").replace(",", ", ");
        }
      } else {
        return null;
      }
    },
    prepareExcelExporter() {
      for (const iterator of this.dataType.dataRows) {
        this.fieldsForExcel[iterator.displayName] =
          this.$caseConvert.stringSnakeToCamel(iterator.field);
      }

      for (const iterator of this.dataType.dataRows) {
        const string = this.$caseConvert.stringSnakeToCamel(iterator.field);
        if (iterator.browse == 1) {
          this.fieldsForPdf.push(
            string.charAt(0).toUpperCase() + string.slice(1)
          );
        }
      }
    },
    openMaintenanceDialog() {
      this.maintenanceDialog = true;
    },
    saveMaintenanceState() {
      this.$api.badasoEntity
        .maintenance({
          slug: this.slug, // $route.params.slug,
          is_maintenance: this.isMaintenance,
        })
        .then((response) => {
          this.maintenanceDialog = false;
        })
        .catch((error) => {
          this.errors = error.errors;
          this.$closeLoader();
          this.$vs.notify({
            title: this.$t("alert.danger"),
            text: error.message,
            color: "danger",
          });
        });
    },
    generatePdf() {
      let data = this.records;

      const result = data.map(Object.values);

      // eslint-disable-next-line new-cap
      const doc = new jsPDF("l");

      // Dynamic table title
      doc.setFont("helvetica", "bold");
      doc.setFontSize(28);
      doc.text(this.dataType.displayNameSingular, 149, 20, "center");

      // Data table
      doc.autoTable({
        head: [this.fieldsForPdf],
        body: result,
        startY: 30,
        // Default for all columns
        styles: { valign: "middle" },
        headStyles: { fillColor: [6, 187, 211] },
        // Override the default above for the text column
        columnStyles: { text: { cellWidth: "wrap" } },
      });

      // Output Table title and data table in new tab
      const output = doc.output("blob");
      data = window.URL.createObjectURL(output);
      window.open(data, "_blank");

      setTimeout(function () {
        // For Firefox it is necessary to delay revoking the ObjectURL
        window.URL.revokeObjectURL(data);
      }, 100);
    },
    loadIdsOfflineDelete() {
      try {
        const keyStore = window.location.pathname;
        this.$readObjectStore(keyStore).then((store) => {
          let dataResult = store.result;
          if (dataResult) {
            dataResult = dataResult.data;
            const newDataResult = [];
            for (const index in dataResult) {
              const { requestMethod, requestData } = dataResult[index];
              if (requestMethod == "delete" && requestData.slug != undefined) {
                newDataResult[newDataResult.length] = dataResult[index];
              }
            }

            let ids = [];
            for (const index in newDataResult) {
              const dataRequest = newDataResult[index].requestData.data;
              for (const indexDataRequest in dataRequest) {
                if (
                  dataRequest[indexDataRequest].field == "id" ||
                  dataRequest[indexDataRequest].field == "ids"
                ) {
                  const valueIds = dataRequest[indexDataRequest].value
                    .toString()
                    .split(",");
                  ids.push(...valueIds);
                }
              }
            }
            ids = ids.filter((itemIds, indexIds, self) => {
              return self.indexOf(itemIds) == indexIds;
            });

            this.idsOfflineDeleteRecord = ids;
          }
        });
      } catch (error) {
        console.error(error);
      }
    },
    async onSwitchChangeDataShow() {
      await this.getEntity();
    },
  },
  computed: {
    isOnline: {
      get() {
        const isOnline = this.$store.getters["badaso/getGlobalState"].isOnline;
        return isOnline;
      },
    },
    maintenanceImg() {
      const config = this.$store.getters["badaso/getConfig"];
      return config.maintenanceImage;
    },
  },
};
</script>
