import BaseLayout from "@/layouts/BaseLayout";
import Hero from "@/components/misc/Hero";
import Stats from "@/components/home/Stats";
import About from "@/components/home/About";
import {reactLang} from "@erag/lang-sync-inertia";
import Container from "@/components/ui/container";
import VehicleFilterSidebar from "@/components/vehicles/VehicleFilterSidebar";
import React from "react";

export default function HomePage() {
    const { __ } = reactLang()

    return (
        <BaseLayout>
            <Hero size='lg'>
                <h1 className='text-4xl font-semibold text-center'>Vozidla</h1>
            </Hero>
            <Container className='grid grid-cols-[384px_1fr] gap-4 p-4'>
                <VehicleFilterSidebar />
                <section className='grid grid-cols-4 p-4 bg-primary-foreground rounded-2xl'>
                    <div className='p-4'></div>
                    <div className='p-4'></div>
                    <div className='p-4'></div>
                    <div className='p-4'></div>
                    <div className='p-4'></div>
                    <div className='p-4'></div>
                </section>
            </Container>
        </BaseLayout>
    );
}
