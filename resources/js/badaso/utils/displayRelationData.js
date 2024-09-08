export default function (record, dataRow) {
    // console.log('displayRelationData.js record', record)
    // console.log('displayRelationData.js dataRow', dataRow)
    if (dataRow.relation) {
        try {
            const relationType = dataRow?.relation?.relationType;
            const table = this.$caseConvert?.stringSnakeToCamel(
                dataRow?.relation?.destinationTable
            );
            this.$caseConvert?.stringSnakeToCamel(dataRow?.relation?.destinationTableColumn);
            const displayColumn = this.$caseConvert?.stringSnakeToCamel(
                dataRow?.relation?.destinationTableDisplayColumn
            );
            if (relationType == "has_one") {
                const list = record[table];
                console.log('displayRelationData.js "has_one"', list)
                if(!list) return
                return list[displayColumn] ? list[displayColumn] : null;
            } else if (relationType == "has_many") {
                const list = record[table];
                console.log('displayRelationData.js "has_many"', list)
                if(!list) return
                const flatList = list.map((ls) => {
                    return ls[displayColumn];
                });
                return flatList.join(", ");
            } else if (relationType == "belongs_to") {
                const lists = record[table];
                console.log('displayRelationData.js "belongs_to"', lists)
                if(!lists) return
                let field = this.$caseConvert?.stringSnakeToCamel(dataRow.field);
                for (let list of lists) {
                    if (list?.id == record[field]) {
                        return list[displayColumn];
                    }
                }
            } else if (relationType == "belongs_to_many") {
                let field = this.$caseConvert?.stringSnakeToCamel(dataRow.field);
                const lists = record[field];
                console.log('displayRelationData.js "belongs_to_many"', lists)
                if(!lists) return
                let flatList = [];
                Object.keys(lists).forEach(function (ls, key) {
                    flatList.push(lists[ls][displayColumn]);
                });
                return flatList.join(",").replace(",", ", ");
            }
        } catch (error) {
            console.log("error", error);
        }
    } else {
        return null;
    }
}
