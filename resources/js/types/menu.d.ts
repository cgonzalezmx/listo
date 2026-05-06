export interface MenuItem {
    label: string;
    command: (e: MouseEvent) => void;
}
