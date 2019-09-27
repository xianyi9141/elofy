//TODO
var pesquisa_tag = {
  globals: [
    {
      id: '01',
      title: 'Implantar Projeto Transformação de Lojas (mapeamento/implantação processos loja, voltado a experiência de consumo)',
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      percentage: 75
    },
    {
      id: '02',
      title: 'Desenvolver e implementar Seminário de Administração de Pessoal avançado para Secretárias Financeiras até outubro com participação de 85% do público',
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      percentage: 45
    },
    {
      id: '03',
      title: 'Garantir Pesquisa de Clima acima de 76% em loja',
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      percentage: 25
    }
  ],
  tatics: [
    {
      id: '1',
      title: 'Pesquisar solução de Mockup',
      percentage: 65,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    },
    {
      id: '2',
      title: 'Lorem ipsum dolor sit amet',
      percentage: 45,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    }
  ],
  keys: [
    {
      id: '1',
      tatic_id: '1',
      title: 'Mapear Soluções 5 opções de solução de Mockup web',
      percentage: 20,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    },
    {
      id: '2',
      tatic_id: '1',
      title: 'Mapear Soluções 5 opções de solução de Mockup web Mapear Soluções 5 opções de solução de Mockup web Mapear Soluções 5 opções de solução de Mockup web',
      percentage: 45,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    },
  ],
  activities: [
    {
      id: '1',
      tatic_id: '1',
      key_id: '1',
      title: 'Pesquisar Alternativas',
      percentage: 21,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    },
    {
      id: '2',
      tatic_id: '1',
      key_id: '1',
      title: 'Pesquisar Alternativas 2',
      percentage: 31,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    }
  ]
}

//TODO
var objetivos_globais_detalhes = {
  id: '01',
  title: 'Implantar Projeto Transformação de Lojas (mapeamento/implantação processos loja, voltado a experiência de consumo)',
  description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. \n\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
  percentage: 75,
  objectives: 15,
  color: '#ff0000',
  year: '2017',
  user: {
    id: '4',
    name: 'John Henderson',
    image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
  },
  users: [
    {
      id: '4',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    {
      id: '5',
      name: 'Paulo Teste 5',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    {
      id: '18',
      name: 'Paulo Teste 18',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    {
      id: '22',
      name: 'Paulo Teste 22',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    {
      id: '24',
      name: 'Paulo Teste 24',
      image: ''
    }
  ],
  tags: [
    {
      id: '1',
      name: 'Amsterdam'
    },
    {
      id: '2',
      name: 'London'
    }
  ],
  teams: [
    {
      id: '1',
      name: 'Tecnologia',
      value: 5,
      porcentage: 45
    },
    {
      id: '2',
      name: 'Administração',
      value:5,
      porcentage: 60
    }
  ],
  teamsWithTatics: [
    {
      id: '1',
      name: 'Tecnologia',
      value: 5
    },
    {
      id: '2',
      name: 'Administração',
      value:5
    }
  ],
  tatics: [
    {
      id: '1',
      title: 'Pesquisar solução de Mockup',
      percentage: 65,
      keys: 5,
      weight: 3,
      status: 3,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      team: {
        id: '1',
        name: 'Tecnologia'
      },
      cycles: [
        {
          id: '1',
          name: '1º Trimestre'
        },
        {
          id: '2',
          name: '2º Trimestre'
        }
      ]
    },
    {
      id: '2',
      title: 'Lorem ipsum dolor sit amet',
      percentage: 45,
      keys: 5,
      weight: 3,
      status: 1,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      team: {
        id: '1',
        name: 'Tecnologia'
      },
      cycles: [
        {
          id: '1',
          name: '1º Trimestre'
        },
        {
          id: '2',
          name: '2º Trimestre'
        }
      ]
    },
    {
      id: '3',
      title: 'Sunt in culpa qui officia deserunt mollit anim id est laborum',
      percentage: 5,
      keys: 5,
      weight: 3,
      status: 0,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      team: {
        id: '2',
        name: 'Administração'
      },
      cycles: [
        {
          id: '2',
          name: '2º Trimestre'
        },
        {
          id: '3',
          name: '3º Trimestre'
        }
      ]
    },
    {
      id: '4',
      title: 'Ed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
      percentage: 25,
      keys: 5,
      weight: 3,
      status: 2,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      team: {
        id: '2',
        name: 'Administração'
      },
      cycles: [
        {
          id: '3',
          name: '3º Trimestre'
        },
        {
          id: '4',
          name: '4º Trimestre'
        }
      ]
    }
  ]
}

//TODO
var objetivos_taticos_detalhes = {
  id: '1',
  title: 'Desenvolver Mockup Elofy',
  description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
  percentage: 94,
  keys: 5,
  weight: 3,
  status: 3,
  init: '01/01/2017',
  end: '31/06/2017',
  year: '2017',
  user: {
    id: '4',
    name: 'John Henderson',
    image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
  },
  users: [
    {
      id: '4',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    {
      id: '5',
      name: 'Paulo Teste',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    }
  ],
  team: {
    id: '4',
    name: 'Administração'
  },
  tags: [
    {
      id: '1',
      name: 'Amsterdam'
    },
    {
      id: '2',
      name: 'London'
    }
  ],
  cycles: [
    {
      id: '1',
      name: '1º Trimestre'
    },
    {
      id: '2',
      name: '2º Trimestre'
    }
  ],
  keys: [
    {
      id: '1',
      title: 'Mapear Soluções 5 opções de solução de Mockup web',
      measurement: 'Horas',      
      goal: '5',
      percentage: 20,
      weight: 1,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    },
    {
      id: '2',
      title: 'Mapear Soluções 5 opções de solução de Mockup web Mapear Soluções 5 opções de solução de Mockup web Mapear Soluções 5 opções de solução de Mockup web',
      measurement: 'R$',
      goal: '2.500',
      percentage: 45,
      weight: 1,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    },
    {
      id: '3',
      title: 'Mapear Soluções 5 opções de solução de Mockup web',
      measurement: 'Unidades',
      goal: 5,
      percentage: 70,
      weight: 3,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    }
  ]
}

//TODO
var chave_detalhes = {
  id: '3',
  title: 'Mapear Soluções 5 opções de solução de Mockup web',
  description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
  frequency: 1,
  measurement: 'Horas',      
  goal: '5',
  percentage: 20,
  weight: 3,
  user: {
    id: '001',
    name: 'John Henderson',
    image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
  },
  users: [
    {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    {
      id: '002',
      name: 'Paulo Teste',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    }
  ],
  tags: [
    {
      id: '1',
      name: 'Amsterdam'
    },
    {
      id: '2',
      name: 'London'
    }
  ],
  attachments: [],
  activities: [
    {
      id: '1',
      title: 'Pesquisar Alternativas',
      description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
      init: '09/06/2017',
      end: '09/08/2017',
      percentage: 21,
      hours: 1,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      users: [
        {
          id: '001',
          name: 'John Henderson',
          image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
        },
        {
          id: '002',
          name: 'Paulo Teste',
          image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
        }
      ]
    },
    {
      id: '2',
      title: 'Pesquisar Alternativas 2',
      description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
      init: '09/06/2017',
      end: '09/08/2017',
      percentage: 31,
      hours: 1,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      users: [
        {
          id: '001',
          name: 'John Henderson',
          image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
        },
        {
          id: '002',
          name: 'Paulo Teste',
          image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
        }
      ]
    },
    {
      id: '3',
      title: 'Pesquisar Alternativas 3',
      description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
      init: '09/06/2017',
      end: '09/08/2017',
      percentage: 71,
      hours: 1,
      user: {
        id: '001',
        name: 'John Henderson',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      users: [
        {
          id: '001',
          name: 'John Henderson',
          image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
        },
        {
          id: '002',
          name: 'Paulo Teste',
          image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
        }
      ]
    }
  ]
}

//TODO
var okrs = [
  {
    id: '1',
    title: 'Pesquisar solução de Mockup',
    percentage: 65,
    keys: 5,
    weight: 3,
    status: 3,
    year: '2017',
    user: {
      id: '4',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    team: {
      id: '1',
      name: 'Tecnologia'
    },
    cycles: [
      {
        id: '1',
        name: '1º Trimestre'
      },
      {
        id: '2',
        name: '2º Trimestre'
      }
    ]
  },
  {
    id: '2',
    title: 'Desenvolver Mockup Elofy',
    percentage: 65,
    keys: 5,
    weight: 3,
    status: 0,
    year: '2017',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    team: {
      id: '2',
      name: 'Administração'
    },
    cycles: [
      {
        id: '2',
        name: '2º Trimestre'
      },
      {
        id: '3',
        name: '3º Trimestre'
      }
    ]
  },
  {
    id: '3',
    title: 'Sunt in culpa qui officia deserunt mollit anim id est laborum',
    percentage: 65,
    keys: 5,
    weight: 3,
    status: 1,
    year: '2017',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    team: {
      id: '1',
      name: 'Tecnologia'
    },
    cycles: [
      {
        id: '3',
        name: '3º Trimestre'
      },
      {
        id: '4',
        name: '4º Trimestre'
      }
    ]
  },
  {
    id: '4',
    title: 'Lorem ipsum dolor sit amet',
    percentage: 65,
    keys: 5,
    weight: 3,
    status: 2,
    year: '2018',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    team: {
      id: '3',
      name: 'Comercial'
    },
    cycles: [
      {
        id: '3',
        name: '3º Trimestre'
      },
      {
        id: '4',
        name: '4º Trimestre'
      }
    ]
  },
  {
    id: '5',
    title: 'Ed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    percentage: 65,
    keys: 5,
    weight: 3,
    status: 3,
    year: '2019',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    team: {
      id: '1',
      name: 'Tecnologia'
    },
    cycles: [
      {
        id: '2',
        name: '2º Trimestre'
      },
      {
        id: '3',
        name: '3º Trimestre'
      }
    ]
  }
]

//TODO
var teamsTree = [
  {
    id: '1',
    name: 'Tecnologia',
    active: true,
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    sub: [
      {
        id: '11',
        name: 'Design',
        active: true,
        user: {
          id: '001',
          name: 'John Henderson',
          image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
        },
        sub: []
      },
      {
        id: '12',
        name: 'Front-end',
        active: true,
        user: {
          id: '001',
          name: 'John Henderson',
          image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
        },
        sub: [
          {
            id: '121',
            name: 'CSS',
            active: true,
            user: {
              id: '001',
              name: 'John Henderson',
              image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
            },
            sub: []
          },
          {
            id: '122',
            name: 'HTML',
            active: true,
            user: {
              id: '001',
              name: 'John Henderson',
              image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
            },
            sub: []
          },
          {
            id: '123',
            name: 'JS',
            active: true,
            user: {
              id: '001',
              name: 'John Henderson',
              image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
            },
            sub: []
          }
        ]
      },
      {
        id: '13',
        name: 'Back-end',
        active: true,
        user: {
          id: '001',
          name: 'John Henderson',
          image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
        },
        sub: []
      }
    ]
  },
  {
    id: '2',
    name: 'Administração',
    active: false,
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    sub: []
  },
  {
    id: '3',
    name: 'Comercial',
    active: true,
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    sub: []
  },
  {
    id: '4',
    name: 'Portaria',
    active: true,
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    sub: []
  },
  {
    id: '5',
    name: 'Gestão',
    active: true,
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    sub: []
  },
  {
    id: '6',
    name: 'Engenharia',
    active: true,
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    sub: []
  }
]

//TODO
var teams = 
[
  {
    id: '1',
    name: 'Tecnologia',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '11',
    name: '- Design',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '12',
    name: '- Front-end',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '121',
    name: '-- CSS',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '122',
    name: '-- HTML',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '123',
    name: '-- JS',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '13',
    name: '- Back-end',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '2',
    name: 'Administração',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '3',
    name: 'Comercial',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '4',
    name: 'Portaria',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '5',
    name: 'Noturno',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '6',
    name: 'Gestão',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '7',
    name: 'Engenharia',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '8',
    name: 'Produção',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '9',
    name: 'Planejamento',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  },
  {
    id: '10',
    name: 'Atendimento',
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  }
];

//TODO
var team_detalhes = 
  {
    id: '1',
    name: 'Tecnologia',
    active: false,
    team: '13',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    members: [
      {
        id: '006',
        name: 'Fulana Silva',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '007',
        name: 'Tiago Fulano',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      },
      {
        id: '008',
        name: 'Nome Teste',
        image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
      }
    ]
  }

//DONE
var atividades_detalhes = {
  id: '1',
  title: 'Pesquisar Alternativas',
  description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
  init: '09/06/2017',
  end: '09/08/2017',
  percentage: 21,
  hours: 3,
  user: {
    id: '001',
    name: 'John Henderson',
    image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
  },
  users: [
    {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    },
    {
      id: '002',
      name: 'Paulo Teste',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    }
  ],
  tags: [
    {
      id: '1',
      name: 'Amsterdam'
    },
    {
      id: '2',
      name: 'London'
    }
  ]
};

//DONE
var users = [
  {
    id: '001',
    name: 'John Henderson',
    image: 'http://demo.neontheme.com/assets/images/thumb-1.png',
    email: 'john@teste.com.br',
    team: 'Tecnologia',
    admin: true,
    appraiser: true,
    active: true
  },
  {
    id: '002',
    name: 'Paulo Teste',
    image: 'http://demo.neontheme.com/assets/images/member-1.jpg',
    email: 'paulo@teste.com.br',
    team: 'Tecnologia',
    admin: false,
    appraiser: true,
    active: false
  },
  {
    id: '003',
    name: 'Daniel Teste',
    image: 'http://demo.neontheme.com/assets/images/member-3.jpg',
    email: 'daniel@teste.com.br',
    team: 'Tecnologia',
    admin: false,
    appraiser: false,
    active: false
  },
  {
    id: '004',
    name: 'Fulano da Silva',
    image: 'http://demo.neontheme.com/assets/images/member-2.jpg',
    email: 'fulano@teste.com.br',
    team: 'Tecnologia',
    admin: false,
    appraiser: false,
    active: true
  },
  {
    id: '005',
    name: 'Ciclano Freitas',
    image: 'http://demo.neontheme.com/assets/images/member-4.jpg',
    email: 'cliclano@teste.com.br',
    team: 'Tecnologia',
    admin: true,
    appraiser: true,
    active: true
  },
  {
    id: '006',
    name: 'Fulana Silva',
    image: 'http://demo.neontheme.com/assets/images/member-5.jpg',
    email: 'fulana@teste.com.br',
    team: 'Tecnologia',
    admin: true,
    appraiser: true,
    active: true
  },
  {
    id: '007',
    name: 'Tiago Fulano',
    image: 'http://demo.neontheme.com/assets/images/member-6.jpg',
    email: 'tiago@teste.com.br',
    team: 'Tecnologia',
    admin: true,
    appraiser: true,
    active: true
  },
  {
    id: '008',
    name: 'Nome Teste',
    image: 'http://demo.neontheme.com/assets/images/thumb-1.png',
    email: 'nome@teste.com.br',
    team: 'Tecnologia',
    admin: true,
    appraiser: true,
    active: true
  }
];

//DONE
var tags = 
[
  {
    id: '1',
    name: 'Amsterdam'
  },
  {
    id: '2',
    name: 'London'
  },
  {
    id: '3',
    name: 'Paris'
  },
  {
    id: '4',
    name: 'Washington'
  },
  {
    id: '5',
    name: 'New York'
  },
  {
    id: '6',
    name: 'Los Angeles'
  },
  {
    id: '7',
    name: 'Sydney'
  },
  {
    id: '8',
    name: 'Melbourne'
  },
  {
    id: '9',
    name: 'Canberra'
  },
  {
    id: '10',
    name: 'Beijing'
  },
  {
    id: '11',
    name: 'New Delhi'
  },
  {
    id: '12',
    name: 'Kathmandu'
  },
  {
    id: '13',
    name: 'Cairo'
  },
  {
    id: '14',
    name: 'Cape Town'
  },
  {
    id: '15',
    name: 'Kinshasa'
  }
];

//DONE
var years = [
  {
    id: '1',
    name: 2016
  },
  {
    id: '2',
    name: 2017
  },
  {
    id: '3',
    name: 2018
  },
  {
    id: '4',
    name: 2019
  }
]

//DONE
var cycles = 
[
  {
    id: '1',
    name: '1º Trimestre'
  },
  {
    id: '2',
    name: '2º Trimestre'
  },
  {
    id: '3',
    name: '3º Trimestre'
  },
  {
    id: '4',
    name: '4º Trimestre'
  }
];


//DONE
var user = {
    id: '001',
    name: 'John Henderson',
    image: 'http://demo.neontheme.com/assets/images/thumb-1.png',
    favorites: ['01', '02']
}

//DONE
var user_detalhes = {
    id: '001',
    name: 'John Henderson',
    image: 'http://demo.neontheme.com/assets/images/thumb-1.png',
    email: 'john@teste.com.br',
    team: 'Tecnologia',
    admin: true,
    appraiser: true,
    active: true
}

/*{
    id: '001',
    name: 'John Henderson',
    image: 'http://demo.neontheme.com/assets/images/thumb-1.png',
    email: 'john@teste.com.br',
    team: 'Tecnologia',
    admin: true,
    appraiser: true,
    active: true
  }*/

//DONE
var objetivos_globais = 
[
  {
    id: '01',
    title: 'Implantar Projeto Transformação de Lojas (mapeamento/implantação processos loja, voltado a experiência de consumo)',
    percentage: 50,
    objectives: 15,
    color: '#3fb9ea',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    }
  },
  {
    id: '02',
    title: 'Desenvolver e implementar Seminário de Administração de Pessoal avançado para Secretárias Financeiras até outubro com participação de 85% do público',
    percentage: 13.5,
    objectives: 15,
    color: '',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    }
  },
  {
    id: '03',
    title: 'Garantir Pesquisa de Clima acima de 76% em loja',
    percentage: 13.5,
    objectives: 15,
    color: '#000',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    }
  },
  {
    id: '04',
    title: 'Expanção AL',
    percentage: 13.5,
    objectives: 15,
    color: '#0000ff',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    }
  },
  {
    id: '05',
    title: 'Expanção AL',
    percentage: 13.5,
    objectives: 15,
    color: '#9ad1e5',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    }
  },
  {
    id: '06',
    title: 'Expanção AL',
    percentage: 13.5,
    objectives: 15,
    color: '',
    user: {
      id: '001',
      name: 'John Henderson',
      image: 'http://demo.neontheme.com/assets/images/thumb-1.png'
    }
  }
];