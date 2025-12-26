import BaseLayout from "@/layouts/BaseLayout";
import Hero from "@/components/misc/Hero";
import Container from "@/components/ui/container";
import VehicleFilterSidebar from "@/components/vehicles/VehicleFilterSidebar";
import VehicleCard from "@/components/vehicles/VehicleCard";

export default function VehiclePage(props: any) {
    return (
        <BaseLayout>
            <Hero>
                <h1 className='text-4xl font-semibold text-center'>{__('web.vehicles_2')}</h1>
            </Hero>
            <Container className='grid grid-cols-1 lg:grid-cols-[384px_1fr] gap-4 p-4'>
                <VehicleFilterSidebar filter={props.filter} />
                <section className='grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4'>
                    {Array.from({ length: 10 }).map((_, i) => (
                        <VehicleCard key={i} />
                    ))}
                </section>
            </Container>
        </BaseLayout>
    );
}
