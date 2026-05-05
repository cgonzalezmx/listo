import { ulid } from "ulid";

export class Checklist {
    items = $state<Item[]>([]);
    title = $state('');

    addItem() {
        this.items.push({
            id: ulid(),
            title: '',
            is_checked: false,
            position: this.items.length
        })
    }
}
