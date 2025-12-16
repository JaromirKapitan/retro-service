import BaseLayout from "@/layouts/BaseLayout";
import Hero from "@/components/misc/Hero";
import Stats from "@/components/home/Stats";
import About from "@/components/home/About";
import React from "react";

export default function HomePage(props: any) {
    return (
        <BaseLayout>
            <Hero size='lg' img={props.hero_img}>
                <h1 className='text-6xl font-semibold text-center'>{__('web.welcome')}</h1>
            </Hero>
            <Stats stats={props.stats} />
            <About page={props.page.data}/>
        </BaseLayout>
    );
}
