<template>
  <div class="pr-0">
    <span class="label">Followup</span>
    <vs-select placeholder="Semua" v-model="select1">
      <vs-select-item
        :key="index"
        :value="item.value"
        :text="item.text"
        v-for="(item, index) in options1"
      />
    </vs-select>
  </div>
</template>

<script>
const arr = [
  {
    text: "1. antri",
    value: "antri",
  },
  {
    text: "2. diproses",
    value: "diproses",
  },
  {
    text: "3. disetujui",
    value: "disetujui",
  },
  {
    text: "4. presentasi",
    value: "presentasi",
  },
  {
    text: "5. eksekusi",
    value: "eksekusi",
  },
  {
    text: "6. tuntas",
    value: "tuntas",
  },
];
let options1 = [{ text: "Semua", value: "" }];
arr.forEach((element) => {
  options1.push({
    text: element.text,
    value: element.value,
  });
});
export default {
  data() {
    return {
      select1: "",
      options1,
    };
  },
  watch: {
    select1(val) {
      this.$emit("onBubbleEvent", val);
    },
  },
  methods: {
    onClear() {
      this.select1 = "";
    },
  },
};
</script>

<style scope>
.label {
  color: rgba(0, 0, 0, 0.4);
  font-size: 0.7rem;
}
</style>
