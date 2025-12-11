import BaseLayout from "@/layouts/BaseLayout.jsx";

export default function AboutPage(props) {
    return (
        <BaseLayout>
            <h1>About {props.user.data.name}!</h1>
            <pre>{JSON.stringify(props, null, 2)}</pre>
        </BaseLayout>
    );
}
