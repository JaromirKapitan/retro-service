import { reactLang } from "@erag/lang-sync-inertia";

type LangFn = (...a: any[]) => string;

export function __(key: string, ...args: any[]): string {
    const lang = reactLang() as any;
    const raw = typeof lang?.__ === "function"
        ? lang.__.bind(lang)
        : ((k: string) => k);
    const fn = raw as LangFn;

    try {
        return fn(key, ...args);
    } catch {
        return String(key);
    }
}

if (typeof window !== "undefined") {
    (window as any).__ = __;
}

export default __;
