import BaseLayout from "@/layouts/BaseLayout";
import Hero from "@/components/misc/Hero";
import Container from "@/components/ui/container";
import VehicleFilter from "@/components/vehicles/VehicleFilter";
import VehicleCard from "@/components/vehicles/VehicleCard";
import VehiclePage from "./VehiclePage";

export default function VehiclesPage(props: any) {
    return (
        <BaseLayout>
            <Hero>
                <h1 className='text-4xl font-semibold text-center'>{__('web.vehicles_2')}</h1>
            </Hero>
            <Container className='flex flex-col gap-4 p-4'>
                <VehicleFilter filter={props.filter} />
                <section className='grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4'>
                    {props.vehicles.map((vehicle: any) => (
                        <VehicleCard key={vehicle.id} vehicle={vehicle} />
                    ))}
                </section>
            </Container>
        </BaseLayout>
    );
}
