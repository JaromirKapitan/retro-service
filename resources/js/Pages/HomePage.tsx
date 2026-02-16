import BaseLayout from "@/layouts/BaseLayout";
import Hero from "@/components/misc/Hero";
import Stats from "@/components/home/Stats";
import About from "@/components/home/About";
import React from "react";

export default function HomePage(props: any) {
    return (
        <BaseLayout>
            <Hero size='md' img={props.page.data.hero_img}>
                <h1 className='text-8xl font-semibold text-center font-allura text-shadow-lg/30'>{ props.page.data.title }</h1>
            </Hero>
            <Stats stats={props.stats} />
            {/* <About page={props.page.data}/> */}
        </BaseLayout>
    );
}
