export interface VehicleInfo {
  id: number
  title: string
  sub_title: string
  description: string
  brand: string
  model: string
  year_from: number
  year_to?: number | null
  thumbnail: string
  [key: string]: any
}