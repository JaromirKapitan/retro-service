import BaseLayout from "@/layouts/BaseLayout";
import Hero from "@/components/misc/Hero";
import Container from "@/components/ui/container";
import VehicleFilterSidebar from "@/components/vehicles/VehicleFilterSidebar";
import React from "react";

export default function VehiclePage(props: any) {
    return (
        <BaseLayout>
            <Hero size='lg'>
                <h1 className='text-4xl font-semibold text-center'>{__('web.vehicles_2')}</h1>
            </Hero>
            <Container className='grid grid-cols-[384px_1fr] gap-4 p-4'>
                <VehicleFilterSidebar filter={props.filter} />
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
