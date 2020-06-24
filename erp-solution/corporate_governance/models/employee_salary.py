# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class EmployeeSalary(models.Model):
    _name = 'governance.employee.salary'
    _description = 'Employee Salary Model'
    employee_id = fields.Many2one('hr.employee', string='Employee')
    basic = fields.Float('Basic Salary')
    allowance = fields.Float()
    tax = fields.Float()
    gross_salary = fields.Float()
    net_salary = fields.Float()