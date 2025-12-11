import BaseLayout from "@/layouts/BaseLayout.jsx";

export default function Homepage(props) {
    return (
        <BaseLayout>
            <h1>Hello, Homepage!</h1>
            <pre>{JSON.stringify(props, null, 2)}</pre>
        </BaseLayout>
    );
}
