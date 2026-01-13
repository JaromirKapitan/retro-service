// File: resources/js/types/global.d.ts
declare global {
    function __(key: string, ...args: any[]): string;
    interface Window {
        __?: (key: string, ...args: any[]) => string;
        isAdmin: boolean;
    }
    var __: (key: string, ...args: any[]) => string;
}
export {};
