import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'
import ErrorBoundary from '../misc/ErrorBoundary'
import { Card } from '../ui/card'
import { FilterOptions } from '@/lib/types/FilterOptions'

export interface VehicleFilterState {
  type: string;
  brand: string;
  model: string;
  year: string;
}

const VehicleFilter = ({
  filterOptions,
  onFilterChange,
  currentFilters
}: {
  filterOptions?: FilterOptions | null,
  onFilterChange: (filters: VehicleFilterState) => void,
  currentFilters: VehicleFilterState
}) => {
  const handleChange = (field: keyof VehicleFilterState, value: string) => {
    onFilterChange({
      ...currentFilters,
      [field]: value
    })
  }

  return (
    <ErrorBoundary fallback={<div>Error</div>}>
      <Card className='grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 gap-x-8 w-full p-4 bg-primary-foreground rounded-2xl'>
        <div className='grid grid-cols-[80px_1fr] xl:flex xl:gap-4'>
          <Label>Typ</Label>
          <Select
            value={currentFilters.type}
            onValueChange={(val) => handleChange('type', val)}
          >
            <SelectTrigger className='w-full' disabled={!filterOptions?.types?.length}>
              <SelectValue placeholder='Vyberte typ vozidla' />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value='all'>
                All
              </SelectItem>
              {
                filterOptions?.types && filterOptions.types.length > 0 && (
                  filterOptions.types.map(type => (
                    <SelectItem key={type.value} value={type.value}>
                      {type.title}
                    </SelectItem>
                  ))
                )
              }
            </SelectContent>
          </Select>
        </div>
        <div className='grid grid-cols-[80px_1fr] xl:flex xl:gap-4'>
          <Label>Znacka</Label>
          <Select
            value={currentFilters.brand}
            onValueChange={(val) => handleChange('brand', val)}
          >
            <SelectTrigger className='w-full' disabled={!filterOptions?.brands?.length}>
              <SelectValue placeholder='Vyberte typ vozidla' />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value='all'>
                All
              </SelectItem>
              {
                filterOptions?.brands && filterOptions.brands.length > 0 && (
                  filterOptions.brands.map(brand => (
                    <SelectItem key={brand} value={brand}>
                      {brand}
                    </SelectItem>
                  ))
                )
              }
            </SelectContent>
          </Select>
        </div>
        <div className='grid grid-cols-[80px_1fr] xl:flex xl:gap-4'>
          <Label>Model</Label>
          <Select
            value={currentFilters.model}
            onValueChange={(val) => handleChange('model', val)}
          >
            <SelectTrigger className='w-full' disabled={!filterOptions?.models?.length}>
              <SelectValue placeholder='Vyberte typ vozidla' />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value='all'>
                All
              </SelectItem>
              {
                filterOptions?.models && filterOptions.models.length > 0 && (
                  filterOptions.models.map(model => (
                    <SelectItem key={model} value={model}>
                      {model}
                    </SelectItem>
                  ))
                )
              }
            </SelectContent>
          </Select>
        </div>
        <div className='grid grid-cols-[80px_1fr] xl:flex xl:gap-4'>
          <Label>Rok</Label>
          <Input placeholder='1968' type='text' value={currentFilters.year} onChange={(e) => handleChange('year', e.target.value)} />
        </div>
      </Card>
    </ErrorBoundary>
  )
}

export default VehicleFilter
