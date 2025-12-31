interface TypeOption {
  value: string
  title: string
}

export interface FilterOptions {
  types?: TypeOption[]
  brands?: string[]
  models?: string[]

  [key: string]: any
}