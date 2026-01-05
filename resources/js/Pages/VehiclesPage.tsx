import BaseLayout from "@/layouts/BaseLayout"
import Hero from "@/components/misc/Hero"
import Container from "@/components/ui/container"
import VehicleFilter, { VehicleFilterState } from "@/components/vehicles/VehicleFilter"
import VehicleCard from "@/components/vehicles/VehicleCard"
import { VehicleCardInfo } from "@/lib/types/VehicleCardInfo"
import { useEffect, useMemo, useState } from "react"
import { FilterOptions } from "@/lib/types/FilterOptions"

const VehiclesPage = ({filter, vehicles, page, hero_img }: {filter?: FilterOptions | null, vehicles: VehicleCardInfo[],  page?: any, hero_img?: string }) => {
  const [currentFilters, setCurrentFilters] = useState<VehicleFilterState>({
    type: 'all',
    brand: 'all',
    model: 'all',
    year: ''
  })

  const [debouncedYear, setDebouncedYear] = useState('')

  useEffect(() => {
    const timer = setTimeout(() => {
      setDebouncedYear(currentFilters.year)
    }, 300)

    return () => clearTimeout(timer)
  }, [currentFilters.year])

  const dynamicOptions = useMemo(() => {
    const availableForModels = vehicles.filter(v =>
      (currentFilters.type === 'all' || v.type === currentFilters.type) &&
      (currentFilters.brand === 'all' || v.brand === currentFilters.brand)
    )

    const availableForBrands = vehicles.filter(v =>
      (currentFilters.type === 'all' || v.type === currentFilters.type)
    )

    return {
      brands: Array.from(new Set(availableForBrands.map(v => v.brand))),
      models: Array.from(new Set(availableForModels.map(v => v.model))),
      types: filter?.types || []
    }
  }, [currentFilters.type, currentFilters.brand, vehicles, filter])

  const filteredVehicles = useMemo(() => {
    return vehicles.filter(vehicle => {
      const matchesType = currentFilters.type === 'all' || vehicle.type === currentFilters.type
      const matchesBrand = currentFilters.brand === 'all' || vehicle.brand === currentFilters.brand
      const matchesModel = currentFilters.model === 'all' || vehicle.model === currentFilters.model

      let matchesYear = true
      if (debouncedYear) {
        const endYear = vehicle.year_to || vehicle.year_from
        const startYear = vehicle.year_from

        let foundInSpecs = false
        for (let y = startYear; y <= endYear; y++) {
          if (y.toString().includes(debouncedYear)) {
            foundInSpecs = true
            break
          }
        }
        matchesYear = foundInSpecs
      }

      return matchesType && matchesBrand && matchesModel && matchesYear
    })
  }, [currentFilters, debouncedYear, vehicles])

  const handleFilterChange = (newFilters: VehicleFilterState) => {
    if (newFilters.brand !== currentFilters.brand) {
      newFilters.model = 'all'
    }

    if (newFilters.type !== currentFilters.type) {
      newFilters.brand = 'all'
      newFilters.model = 'all'
    }

    setCurrentFilters(newFilters)
  }

  return (
    <BaseLayout>
      <Hero size='lg' img={hero_img}>
        <h1 className='text-4xl font-semibold text-center'>{page.data.title}</h1>
      </Hero>
      <Container className='flex flex-col gap-4 p-4'>
        <VehicleFilter
          filterOptions={dynamicOptions}
          currentFilters={currentFilters}
          onFilterChange={handleFilterChange}
        />
        <section className='grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4'>
          {
            filteredVehicles.length > 0 ? (
              filteredVehicles.map((vehicle) => (
                <VehicleCard key={vehicle.id} vehicle={vehicle} />
              ))
            ) : (
              <div className="col-span-full text-center py-10">
                Nenašli sa žiadne vozidlá zodpovedajúce vašim kritériám.
              </div>
            )
          }
        </section>
      </Container>
    </BaseLayout>
  )
}

export default VehiclesPage
