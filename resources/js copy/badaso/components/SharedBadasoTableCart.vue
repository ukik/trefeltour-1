<template>
    <div
      :class="[{ stripe: stripe, hoverFlat: hoverFlat }, `vs-table-${color}`]"
      class="vs-component vs-con-table"
    >
    <!-- {{ datax }} --- {{ pagination }} -->

    <!-- header -->
      <header class="header-table vs-table--header">
        <vs-row class="badaso-table__table-header">
          <vs-col vs-lg="6" vs-md="6" vs-sm="6" vs-xs="12" v-if="pagination">
            <div class="badaso-table__header-dropdown">
              Show&nbsp;
              <vs-select v-model="maxItemsx" width="100px">
                <vs-select-item
                  :key="index"
                  :value="row"
                  :text="row"
                  v-for="(row, index) in descriptionItems"
                />
              </vs-select>
              &nbsp;Entries
            </div>
          </vs-col>
          <vs-col vs-lg="6" vs-md="6" vs-sm="6" vs-xs="12" v-if="search">
            <div class="con-input-search vs-table--search badaso-table__search">
              <input
                v-model="searchx"
                class="input-search vs-table--search-input"
                type="text"
              />
              <vs-icon icon="search"></vs-icon>
            </div>
          </vs-col>
        </vs-row>
      </header>
      <div class="con-tablex vs-table--content">
        <div :style="styleConTbody" class="vs-con-tbody vs-table--tbody">
          <table ref="table" class="vs-table vs-table--tbody-table">
            <thead ref="thead" class="vs-table--thead">
              <tr>
                <th v-if="multiple || hasExpadableData" class="td-check">
                  <!-- <span v-if="multiple" class="con-td-check">
                    <vs-checkbox
                      :key="isCheckedLine ? 'remove' : 'check'"
                      :icon="isCheckedLine ? 'remove' : 'check'"
                      :checked="isCheckedMultiple"
                      size="small"
                      @change="changeCheckedMultiple"
                    />
                  </span> -->

                  <!-- <span v-if="value?.length > 0" class="con-td-check">
                    <vs-checkbox
                      :key="isCheckedLine ? 'remove' : 'check'"
                      :icon="isCheckedLine ? 'remove' : 'check'"
                      :checked="isCheckedMultiple"
                      size="small"
                      @change="changeCheckedMultiple"
                    />
                  </span> -->
                </th>
                <slot name="thead"></slot>
              </tr>
            </thead>
            <slot :data="datax"></slot>
          </table>
        </div>
        <div v-if="isNoData" class="not-data-table vs-table--not-data">
          {{ noDataText }}
        </div>

        <!-- {{ currentx }} -- {{ maxItemsx }} -- {{ searchx && !sst ? getTotalPagesSearch : getTotalPages }}
        --- {{ searchx && !sst ? getTotalPagesSearch : getTotalPages }} -- {{ lastPage }} -->

        <div v-if="pagination" class="con-pagination-table vs-table--pagination">
          <badaso-pagination
            v-model="currentx"
            :total="lastPage"
            :description-items="descriptionItems"
            :max-items="maxItemsx"
            :size-array="queriedResults.length"
            :description="description"
            :description-title="descriptionTitle"
            :description-connector="descriptionConnector"
            :description-body="descriptionBody"
            @changeMaxItems="changeMaxItems"
          >

          <!-- <badaso-pagination
            v-model="currentx"
            :total="searchx && !sst ? getTotalPagesSearch : getTotalPages"
            :description-items="descriptionItems"
            :max-items="maxItemsx"
            :size-array="queriedResults.length"
            :description="description"
            :description-title="descriptionTitle"
            :description-connector="descriptionConnector"
            :description-body="descriptionBody"
            @changeMaxItems="changeMaxItems"
          > -->
          </badaso-pagination>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    name: "BadasoTable",
    props: {
      lastPage: {
          default: 0
      },
      perPage: {
          default: 50
      },

      value: [], // {},
      color: {
        default: "primary",
        type: String,
      },
      noDataText: {
        default: "No data Available",
        type: String,
      },
      stripe: {
        default: false,
        type: Boolean,
      },
      hoverFlat: {
        default: false,
        type: Boolean,
      },
      maxHeight: {
        default: "auto",
        type: String,
      },
      multiple: {
        default: true,
        type: Boolean,
      },
      data: {
        default: null,
      },
      notSpacer: {
        default: false,
        type: Boolean,
      },
      search: {
        default: false,
        type: Boolean,
      },
      maxItems: {
        default: 5,
        type: [Number, String],
      },
      pagination: {
        default: false,
        type: Boolean,
      },
      description: {
        default: false,
        type: Boolean,
      },
      descriptionItems: {
        default: () => [],
        type: Array,
      },
      descriptionTitle: {
        type: String,
      },
      descriptionConnector: {
        type: String,
      },
      descriptionBody: {
        type: String,
      },
      currentPage: {
        default: 1,
        type: Number || String,
      },
      sst: {
        default: false,
        type: Boolean,
      },
      total: {
        type: Number,
        default: 0,
      },
      onlyClickCheckbox: {
        type: Boolean,
        default: true,
      },
    },
    data: () => ({
      headerWidth: "100%",
      trs: [],
      datax: [],
      searchx: null,
      currentx: 1,
      maxItemsx: 5,
      hasExpadableData: false,
      currentSortKey: null,
      currentSortType: null,
      // value:[],
    }),
    computed: {
      getTotalPages() {
        const totalLength =
          this.sst && this.total ? this.total : this.data.length;
        return Math.ceil(totalLength / this.maxItemsx);
      },
      getTotalPagesSearch() {
        return Math.ceil(this.queriedResults.length / this.maxItems);
      },
      queriedResults() {
        let queriedResults = this.data;
        if (this.searchx && this.search) {
          const dataBase = this.data;
          queriedResults = dataBase.filter((tr) => {
            const values = this.getValues(tr).toString().toLowerCase();
            return values.indexOf(this.searchx.toLowerCase()) != -1;
          });
        }
        return queriedResults;
      },
      isNoData() {
        // eslint-disable-next-line valid-typeof
        if (typeof this.datax == Object) {
          return this.datax
            ? Object.keys(this.datax).length == 0
            : false && this.search;
        } else {
          return this.datax ? this.datax.length == 0 : false && this.search;
        }
      },
      isCheckedLine() {
        const lengthx = this.data.length;
        const lengthSelected = this.value.length;
        return lengthx !== lengthSelected;
      },
      isCheckedMultiple() {
        return this.value.length > 0;
      },
      styleConTbody() {
        return {
          maxHeight: this.maxHeight,
          overflow: this.maxHeight != "auto" ? "auto" : null,
        };
      },
      getThs() {
        const ths = this.$slots.thead.filter((item) => item.tag);
        return ths.length;
      },
      tableHeaderStyle() {
        return {
          width: this.headerWidth,
        };
      },
    },
    watch: {
      currentPage() {
        this.currentx = this.currentPage;
        console.log('currentPage', this.currentPage)
      },
      currentx() {
        if (this.sst) {
          this.$emit("change-page", this.currentx);
        } else {
          this.loadData();
        }
        this.$emit('onChangePage', this.currentx)
        console.log('currentx', this.currentx)
      },
      maxItems(val) {
        this.maxItemsx = val;
        this.loadData();
      },
      maxItemsx() {
          this.$emit('onChangeMaxItems', this.maxItemsx)
          this.loadData();
      },
      data() {
          console.log('DataTable data', this.data)
          this.loadData();
          this.$nextTick(() => {
              if (this.datax.length > 0) {
                  this.changeTdsWidth();
              }
              this.datax = this.data
          });
      },
      searchx() {
        this.$emit("search", this.searchx);
        return
        if (this.sst) {
          this.$emit("search", this.searchx);
        } else {
          this.loadData();
          this.currentx = 1;
        }
      },
    },
    mounted() {
      window.addEventListener("resize", this.listenerChangeWidth);
      this.maxItemsx = this.perPage //this.maxItems;
      this.loadData();

      // this.$nextTick(() => {
      //   if(this.datax.length > 0) {
      //     this.changeTdsWidth()
      //   }
      // })
    },
    destroyed() {
      window.removeEventListener("resize", this.listenerChangeWidth);
    },
    methods: {
      loadData() {
        const max = Math.ceil(this.currentx * this.maxItemsx);
        const min = max - this.maxItemsx;

        if (!this.searchx || this.sst) {
          this.datax = this.pagination
            ? this.getItems(min, max)
            : this.sortItems(this.data) || [];
        } else {
          this.datax = this.pagination
            ? this.getItemsSearch(min, max)
            : this.getItemsSearch(min, max) || [];
        }
      },
      getItems(min, max) {
        const dataBase = this.sortItems(this.data);

        const items = [];
        dataBase.forEach((item, index) => {
          if (index >= min && index < max) {
            items.push(item);
          }
        });
        return items;
      },
      sortItems(data) {
        const { currentSortKey, currentSortType } = this;
        function compare(a, b) {
          if (a[currentSortKey] < b[currentSortKey])
            return currentSortType == "desc" ? 1 : -1;
          if (a[currentSortKey] > b[currentSortKey])
            return currentSortType == "desc" ? -1 : 1;
          return 0;
        }
        return currentSortType !== null ? [...data].sort(compare) : [...data];
      },
      getItemsSearch(min, max) {
        const search = this.normalize(this.searchx);

        return this.sortItems(this.data)
          .filter((tr) => {
            return (
              this.normalize(this.getValues(tr).toString()).indexOf(search) != -1
            );
          })
          .filter((_, index) => {
            return index >= min && index < max;
          });
      },
      sort(key, sortType) {
        this.currentSortKey = key;
        this.currentSortType = sortType;
        if (this.sst) {
          this.$emit("sort", key, sortType);
          return;
        }
        this.loadData();
      },
      normalize(string) {
        return string
          .normalize("NFD")
          .replace(/[\u0300-\u036f]/g, "")
          .toLowerCase();
      },
      getValues: function getValues(obj) {
        function flattenDeep(val) {
          return Object.values(val || []).reduce(
            (acc, val) =>
              typeof val === "object"
                ? acc.concat(flattenDeep(val))
                : acc.concat(val),
            []
          );
        }

        return flattenDeep(obj).filter(function (item) {
          return typeof item === "string" || typeof item === "number";
        });
      },
      changeCheckedMultiple() {
        const lengthx = this.data.length;
        const lengthSelected = this.value.length;
        const selectedx = lengthx - lengthSelected;
        if (selectedx == 0) {
          this.$emit("input", []);
        } else {
          this.$emit("input", this.data);
        }
      },
      handleCheckbox(tr) {
        if (this.multiple && this.onlyClickCheckbox) {
          const val = this.value.slice(0);
          if (val.includes(tr)) {
            val.splice(val.indexOf(tr), 1);
          } else {
            val.push(tr);
          }

          this.$emit("input", val);
          this.$emit("selected", tr);
        }
      },
      clicktr(tr, isTr) {
        if (this.multiple && isTr && !this.onlyClickCheckbox) {
          const val = this.value.slice(0);
          if (val.includes(tr)) {
            val.splice(val.indexOf(tr), 1);
          } else {
            val.push(tr);
          }

          this.$emit("input", val);
          this.$emit("selected", tr);
        } else if (isTr && !this.onlyClickCheckbox) {
          this.$emit("input", tr);
          this.$emit("selected", tr);
        }
      },
      dblclicktr(tr, isTr) {
        if (isTr) {
          this.$emit("dblSelection", tr);
        }
      },
      listenerChangeWidth() {
        this.headerWidth = `${this.$refs.table.offsetWidth}px`;
        this.changeTdsWidth();
      },
      changeTdsWidth() {
        if (!this.value) return;

        const tbody = this.$refs.table.querySelector("tbody");

        // Adding condition removes querySelector none error - if tbody isnot present
        if (tbody) {
          const trvs = tbody.querySelector(".tr-values");
          if (trvs === undefined || trvs === null) return;
          const tds = trvs.querySelectorAll(".td");

          const tdsx = [];

          tds.forEach((td, index) => {
            tdsx.push({ index: index, widthx: td.offsetWidth });
          });

          const colgrouptable = this.$refs.colgrouptable;
          if (colgrouptable !== undefined && colgrouptable !== null) {
            const colsTable = colgrouptable.querySelectorAll(".col");
            colsTable.forEach((col, index) => {
              col.setAttribute("width", tdsx[index].widthx);
            });
          }
        }
      },
      changeMaxItems(index) {
        this.maxItemsx = this.descriptionItems[index];
      },
    },
  };
  </script>
