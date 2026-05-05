import { ulid } from "ulid";
import type { Checklist as TChecklist } from "@/types/checklist.js";
import type { Item } from "@/types/item.js";

export class Checklist {
    items = $state<Item[]>([]);
    title = $state('');
    id: string;

    constructor(data: TChecklist) {
        this.id = data.id;
        this.items.concat(data.items);
        this.title = data.title ?? '';
    }

    addItem(): Item {
        const item: Item = {
            id: ulid(),
            title: '',
            is_checked: false,
            position: this.items.length
        };
        this.items.push(item);
        return item;
    }
}
