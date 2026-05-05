import type { Item } from "./item";

export interface Checklist {
    id: string;
    created_at: string;
    updated_at: string;
    owner_id: string;
    title?: string;
    description?: string;
    is_public: boolean;
    is_archived: boolean;
    items: Item[];
}
