import BaseLayout from "@/layouts/BaseLayout";
import Hero from "@/components/misc/Hero";
import Stats from "@/components/home/Stats";
import About from "@/components/home/About";
import {reactLang} from "@erag/lang-sync-inertia";

export default function HomePage() {
    const { __ } = reactLang()

    return (
        <BaseLayout>
            <Hero size='lg'>
                <h1 className='text-6xl font-semibold text-center'>{__('web.welcome')}</h1>
            </Hero>
            <Stats />
            <About />
        </BaseLayout>
    );
}
